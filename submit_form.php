<?php
session_start();
require_once 'includes/env.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// CSRF validation
$submitted_token = $_POST['csrf_token'] ?? '';
$session_token   = $_SESSION['csrf_token'] ?? '';

if (!$session_token || !hash_equals($session_token, $submitted_token)) {
    header('Location: contact-us.php?error=invalid_request');
    exit();
}

// Invalidate token after use (one-time use)
unset($_SESSION['csrf_token']);

// Sanitise and validate inputs
// strip_tags removes any HTML/PHP tags, preg_replace removes newlines (header injection
// defence), htmlspecialchars encodes remaining special characters for safe HTML output.
function sanitise_field(string $value, int $max_length = 255): string {
    $value = trim($value);
    $value = strip_tags($value);
    $value = preg_replace('/[\r\n\t]/', ' ', $value); // prevent header injection
    $value = mb_substr($value, 0, $max_length);
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$name    = sanitise_field($_POST['name']    ?? '');
$phone   = sanitise_field($_POST['phone']   ?? '');
$message = sanitise_field($_POST['message'] ?? '', 5000);

// Email validated separately — filter_var returns false on invalid input
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$email = $email ? mb_substr($email, 0, 255) : false;

// Validate phone format if provided (digits, spaces, +, -, () only)
if ($phone !== '' && !preg_match('/^[0-9+\-() ]{6,30}$/', $phone)) {
    $phone = ''; // silently clear invalid phone rather than reject the whole form
}

if (!$name || !$email || !$message) {
    header('Location: contact-us.php?error=missing_fields');
    exit();
}

// Load SMTP config from environment
$smtp_host      = $_ENV['SMTP_HOST']       ?? '';
$smtp_user      = $_ENV['SMTP_USER']       ?? '';
$smtp_pass      = $_ENV['SMTP_PASS']       ?? '';
$smtp_port      = (int)($_ENV['SMTP_PORT'] ?? 465);
$smtp_from_name = $_ENV['SMTP_FROM_NAME']  ?? 'AetherDataLabs';
$mail_to        = $_ENV['MAIL_TO_ADDRESS'] ?? '';
$mail_to_name   = $_ENV['MAIL_TO_NAME']   ?? 'AetherDataLabs';
$mail_cc        = $_ENV['MAIL_CC_ADDRESS'] ?? '';
$mail_cc_name   = $_ENV['MAIL_CC_NAME']   ?? '';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = $smtp_host;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp_user;
    $mail->Password   = $smtp_pass;
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = $smtp_port;

    $mail->setFrom($smtp_user, $smtp_from_name);
    $mail->addAddress($mail_to, $mail_to_name);

    if ($mail_cc !== '') {
        $mail->addAddress($mail_cc, $mail_cc_name);
    }

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission — AetherDataLabs';

    // nl2br preserves line breaks in the HTML email body
    $message_html = nl2br($message);
    $phone_display = $phone ?: 'Not provided';

    $mail->Body = "
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Phone:</strong> {$phone_display}</p>
        <p><strong>Message:</strong><br>{$message_html}</p>
    ";
    $mail->AltBody = "Name: {$name}\nEmail: {$email}\nPhone: {$phone_display}\nMessage:\n{$message}";

    $mail->send();

    header('Location: thank-you.php');
    exit();

} catch (Exception $e) {
    error_log('PHPMailer error: ' . $mail->ErrorInfo);
    header('Location: contact-us.php?error=send_failed');
    exit();
}
