<?php
http_response_code(404);
$meta_description = 'Page not found — AetherDataLabs';
$og_title         = '404 — AetherDataLabs';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>404 - Page Not Found | AetherDataLabs</title>
    <?php include 'includes/head.php'; ?>
    <style>
        .notfound-hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            overflow: hidden;
        }

        .notfound-hero .bg-video {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: 0;
        }

        .notfound-hero .hero-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .notfound-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            padding: 40px 20px;
            animation: fadeUp 1s ease forwards;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(40px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .notfound-code {
            font-size: 7rem;
            font-weight: 700;
            letter-spacing: 4px;
            line-height: 1;
            margin-bottom: 16px;
            opacity: 0.85;
        }

        .notfound-content h1 {
            font-size: 1.8rem;
            font-weight: 600;
            letter-spacing: 2px;
            margin-bottom: 16px;
        }

        .notfound-content p {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #cccccc;
            margin-bottom: 40px;
        }

        .home-btn {
            display: inline-block;
            padding: 14px 36px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 1px;
            background: rgba(255, 255, 255, 0.07);
            transition: all 0.3s ease;
        }

        .home-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.6);
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
            .notfound-code { font-size: 5rem; }
            .notfound-content h1 { font-size: 1.4rem; }
        }
    </style>
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <section class="notfound-hero">
        <video class="bg-video" autoplay muted loop playsinline controlslist="nodownload">
            <source src="assets/video/background-video.mp4" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>

        <div class="notfound-content">
            <p class="notfound-code">404</p>
            <h1>Page Not Found</h1>
            <p>
                The page you're looking for doesn't exist or has been moved.<br>
                Let's get you back on track.
            </p>
            <a href="index.php" class="home-btn">Back to Home</a>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
