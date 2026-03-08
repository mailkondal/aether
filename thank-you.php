<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thank You - AetherDataLabs</title>
    <?php include 'includes/head.php'; ?>
    <style>
        .thankyou-hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            overflow: hidden;
        }

        .thankyou-hero .bg-video {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: 0;
        }

        .thankyou-hero .hero-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .thankyou-content {
            position: relative;
            z-index: 2;
            max-width: 640px;
            padding: 40px 20px;
            animation: fadeUp 1s ease forwards;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(40px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .check-icon {
            width: 80px;
            height: 80px;
            border: 2px solid rgba(255,255,255,0.4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 32px;
            animation: pulse 2.5s ease infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(255,255,255,0.15); }
            50%       { box-shadow: 0 0 0 16px rgba(255,255,255,0); }
        }

        .check-icon svg { width: 36px; height: 36px; }

        .thankyou-content h1 {
            font-size: 2.8rem;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 16px;
        }

        .thankyou-content p {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #cccccc;
            margin-bottom: 40px;
        }

        .back-btn {
            display: inline-block;
            padding: 14px 36px;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 8px;
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 1px;
            background: rgba(255,255,255,0.07);
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: rgba(255,255,255,0.15);
            border-color: rgba(255,255,255,0.6);
            transform: translateY(-2px);
        }

        .countdown {
            margin-top: 32px;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.4);
            letter-spacing: 1px;
        }

        @media (max-width: 600px) {
            .thankyou-content h1 { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <section class="thankyou-hero">
        <video class="bg-video" autoplay muted loop playsinline controlslist="nodownload">
            <source src="assets/video/background-video.mp4" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>

        <div class="thankyou-content">
            <div class="check-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>

            <h1>Thank You</h1>
            <p>
                Your message has been received.<br>
                We'll be in touch with you very soon.
            </p>

            <a href="index.php" class="back-btn">Back to Home</a>

            <p class="countdown" id="countdown"></p>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
    let seconds = 8;
    const el = document.getElementById('countdown');

    function tick() {
        el.textContent = 'Redirecting in ' + seconds + 's…';
        if (seconds <= 0) {
            window.location.href = 'index.php';
        } else {
            seconds--;
            setTimeout(tick, 1000);
        }
    }

    tick();
    </script>
</body>
</html>
