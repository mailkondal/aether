<?php
$meta_description = 'Ready to make sense of your data? Get in touch with AetherDataLabs for a free initial consultation with our data engineering and analytics experts.';
$og_title         = 'Contact Us — AetherDataLabs';

session_start();
// Generate a CSRF token for this page load
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

// Surface any error message from a failed submission
$error_messages = [
    'missing_fields'  => 'Please fill in all required fields.',
    'invalid_request' => 'Invalid form submission. Please try again.',
    'send_failed'     => 'Sorry, we could not send your message. Please email us directly.',
];
$error = isset($_GET['error']) ? ($error_messages[$_GET['error']] ?? null) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us - AetherDataLabs</title>
    <?php include 'includes/head.php'; ?>
    <style>
        /* Page Hero */
        .page-hero {
            position: relative;
            width: 100%;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            text-align: center;
            color: #fff;
        }

        .page-hero .hero-video {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: 0;
            filter: brightness(70%);
        }

        .page-hero .hero-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        .page-hero .hero-content { position: relative; z-index: 2; padding: 20px; }

        .page-title {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            line-height: 1.4;
            letter-spacing: 2px;
            margin: 0;
        }

        #second-line { display: block; font-size: 22px; margin-top: 10px; }

        .page-hero .title-word { display: inline-block; margin: 0 8px; }

        .page-hero .page-subtitle { font-size: 1.2rem; margin-top: 15px; opacity: 0.9; }

        @media (max-width: 992px) { .page-hero { height: 60vh; } }
        @media (max-width: 600px) { .page-hero { height: 55vh; padding: 0 10px; } }
        @media (max-width: 768px) { .page-title { font-size: 28px; } #second-line { font-size: 22px; } }

        /* Contact content */
        .contact-content {
            position: relative;
            padding: 100px 0;
            overflow: hidden;
            color: #fff;
            z-index: 1;
        }

        .contact-content .bg-video {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: 0;
            filter: brightness(70%);
        }

        .contact-content .video-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .contact-content .container { position: relative; z-index: 2; }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: start;
        }

        .section-title { font-size: 2.5rem; font-weight: 700; margin-bottom: 30px; }
        .title-word { display: inline-block; margin-right: 8px; }

        .contact-info { color: #fff; }
        .contact-details .contact-item { margin-bottom: 20px; }
        .contact-label { font-size: 1.1rem; font-weight: 600; margin-bottom: 8px; }
        .contact-value { color: #ddd; font-size: 1rem; text-decoration: none; }
        .contact-value:hover { color: #fff; }

        .contact-form-container {
            background: rgba(255,255,255,0.08);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .contact-form .form-group { position: relative; margin-bottom: 20px; }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            color: #fff;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .contact-form input:focus,
        .contact-form textarea:focus { border-color: #fff; }

        .contact-form label {
            position: absolute;
            top: 12px; left: 0;
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
            pointer-events: none;
            transition: 0.3s ease;
        }

        .contact-form input:focus + label,
        .contact-form input:not(:placeholder-shown) + label,
        .contact-form textarea:focus + label,
        .contact-form textarea:not(:placeholder-shown) + label {
            top: -8px;
            font-size: 0.8rem;
            color: #fff;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #00d4aa, #007a62);
            border: none;
            color: #ffffff !important;
            padding: 14px 20px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .submit-btn:hover { transform: translateY(-3px); }

        .form-error {
            background: rgba(220, 50, 50, 0.15);
            border: 1px solid rgba(220, 50, 50, 0.4);
            color: #ff8080;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        @media (max-width: 992px) {
            .contact-grid { grid-template-columns: 1fr; gap: 40px; }
            .contact-content { padding: 80px 20px; }
        }
    </style>
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <!-- Page Hero -->
    <section class="page-hero">
        <video class="hero-video" autoplay muted loop playsinline controlslist="nodownload">
            <source src="assets/video/background-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <h1 class="page-title">
                <span id="typed-text" class="typed-line"></span>
                <span id="second-line" style="opacity:0;">
                    Start your data journey with aether.
                </span>
            </h1>
        </div>
    </section>

    <!-- Contact Form & Info -->
    <section class="contact-content section-animate">
        <video class="bg-video" autoplay muted loop playsinline controlslist="nodownload">
            <source src="assets/video/background-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="video-overlay"></div>

        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2 class="section-title animate-on-scroll">
                        <span class="title-word">Get</span>
                        <span class="title-word">In</span>
                        <span class="title-word">Touch</span>
                    </h2>
                    <div class="contact-details">
                        <div class="contact-item animate-on-scroll" data-delay="0.2">
                            <h3 class="contact-label">Email Us</h3>
                            <a href="mailto:info@aetherdatalabs.com.au" class="contact-value">info@aetherdatalabs.com.au</a>
                        </div>
                        <div class="contact-item animate-on-scroll" data-delay="0.6">
                            <h3 class="contact-label">Consultation</h3>
                            <p class="contact-value">Free initial consultation available</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form-container animate-on-scroll" data-delay="0.3">
                    <?php if ($error): ?>
                        <div class="form-error"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>
                    <form class="contact-form" action="submit_form.php" method="post">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                        <div class="form-group animate-on-scroll" data-delay="0.4">
                            <input type="text" id="name" name="name" placeholder=" " required>
                            <label for="name">Your Name</label>
                        </div>
                        <div class="form-group animate-on-scroll" data-delay="0.5">
                            <input type="email" id="email" name="email" placeholder=" " required>
                            <label for="email">Your Email</label>
                        </div>
                        <div class="form-group animate-on-scroll" data-delay="0.6">
                            <input type="tel" id="phone" name="phone" placeholder=" ">
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="form-group animate-on-scroll" data-delay="0.7">
                            <textarea id="message" name="message" rows="5" placeholder=" " required></textarea>
                            <label for="message">Your Message</label>
                        </div>
                        <button type="submit" class="submit-btn animate-on-scroll" data-delay="0.8">
                            <span class="btn-text" style="color:white !important;">Send Message</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
    const words = ["Ready", "to", "make", "sense", "of", "the", "infinite?"];
    const typedText = document.getElementById("typed-text");
    const secondLine = document.getElementById("second-line");
    let wordIndex = 0, charIndex = 0;

    function typeEffect() {
        if (wordIndex < words.length) {
            if (charIndex < words[wordIndex].length) {
                typedText.innerHTML += words[wordIndex].charAt(charIndex);
                charIndex++;
                setTimeout(typeEffect, 30);
            } else {
                typedText.innerHTML += " ";
                wordIndex++;
                charIndex = 0;
                setTimeout(typeEffect, 80);
            }
        } else {
            secondLine.style.opacity = 1;
            secondLine.style.transition = "opacity 1s ease-in-out";
        }
    }

    window.onload = typeEffect;
    </script>
</body>
</html>
