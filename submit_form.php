<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data safely
    $name = $_POST['name'] ?? '';
   $email = $_POST['email'] ?? '';
     $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';
  

    $mail = new PHPMailer(true);
    try {
          $mail->isSMTP();
               $mail->Host       = 'mail.webbingprotechnologies.in'; // Replace with your SMTP server
$mail->SMTPAuth   = true;
$mail->Username   = 'info@webbingprotechnologies.in'; // Replace with your SMTP username
$mail->Password   = 'Webbing@123++'; // Replace with your SMTP password
$mail->SMTPSecure = 'ssl';
$mail->Port       = 465;

        // Sender and recipient settings
        $mail->setFrom('info@webbingprotechnologies.in', 'Aether Datlabs');
        $mail->addAddress('info@aetherdatalabs.com.au', 'Aether Datlabs');
        $mail->addAddress('rishimuthyala2522@gmail.com', 'Shiva');
        

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Form Submission';
        $mail->Body    = "Name: $name <br>Email: $email <br>Phone: $phone <br>Message: $message";

        // Send email
        $mail->send();

        // Redirect after success
        header("Location: thank-you.php");
        exit();
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    header("Location: index.php");
    exit();
}
?>
