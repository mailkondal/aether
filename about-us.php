<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us - AetherDataLabs</title>
    <?php include 'includes/head.php'; ?>
    <style>
        /* Hero */
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            overflow: hidden;
        }
        .hero h1 { font-weight: bold; white-space: nowrap; font-size: 24px; }
        .hero h1 span { display: block; }

        .text-right {
            opacity: 0;
            animation: slideInRight 3s ease forwards;
            animation-delay: 4s;
        }

        @media (max-width: 768px) {
            .hero h1 {
                white-space: normal;
                display: flex;
                flex-direction: column;
                align-items: center;
                font-size: 1.4rem;
                text-align: center;
            }
            .hero h1 span { display: block; margin: 6px 0; }
            .nkr { display: none; }
            .section-content p { text-align: left; }
        }

        /* Content section */
        .section {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px 10%;
            overflow: hidden;
            gap: 40px;
        }

        .section .video-background {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .section .video-background video { width: 100%; height: 100%; object-fit: cover; }

        .section .overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .section-content, .section-image {
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .section-content { padding-right: 40px; }

        .section-content h2 { font-size: 2.5rem; margin-bottom: 20px; color: #fff; }

        .section-content p {
            line-height: 1.8;
            font-size: 1.1rem;
            color: white;
            margin-bottom: 20px;
        }

        .section-image { text-align: right; }

        .section-image img {
            width: 100%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(255,255,255,0.1);
        }

        @media (max-width: 992px) {
            .section { flex-direction: column; text-align: center; padding: 80px 5%; }
            .section-content { padding-right: 0; margin-bottom: 40px; }
            .section-image img { max-width: 90%; }
        }

        @media (max-width: 768px) {
            .section { flex-direction: column; text-align: center; padding: 40px 5%; }
            .section-image { text-align: center; }
            .section-image img { max-width: 90%; }
        }

        /* Founder cards */
        .data-section {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 40px;
            padding: 60px 20px;
            min-height: 100vh;
        }

        .data-card {
            color: #fff;
            border: 3px solid gray;
            padding: 30px;
            min-height: 900px;
            max-height: 900px;
            overflow: hidden;
            width: 560px;
            max-width: 100%;
            line-height: 1.6;
            box-shadow: 0 0 20px rgba(255,255,255,0.05);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1.2s ease forwards;
        }

        @keyframes fadeUp {
            0%   { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .data-card:nth-child(2) { animation-delay: 0.4s; }

        .card-icon { text-align: center; margin: 15px 0 25px; }
        .card-icon img { width: 50%; height: auto; }

        .data-card h2 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .data-card ul { margin-top: 10px; padding-left: 20px; }
        .data-card li { margin-bottom: 6px; list-style-type: disc; }

        @media (max-width: 768px) {
            .data-section { flex-direction: column; align-items: center; }
            .data-card { width: fit-content; padding: 25px; min-height: 1140px; max-height: 1140px; margin: 0; }
            .data-card h2 { font-size: 1.3rem; }
        }
    </style>
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="story-bg-video">
            <video autoplay muted loop playsinline controlslist="nodownload" style="width:100%; height:100%; object-fit:cover;">
                <source src="assets/video/background-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-overlay"></div>
        <div class="container">
            <h1>
                <span id="typed-text" class="text-left"></span>
                <span id="second-line" class="text-right" style="opacity:0;">
                    shaping data into clarity, purpose, and value.
                </span>
            </h1>
        </div>
    </section>

    <!-- About Content Section -->
    <section class="section">
        <div class="video-background">
            <video autoplay muted loop playsinline controlslist="nodownload">
                <source src="assets/video/background-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="overlay"></div>

        <div class="section-content">
            <p>Aether DataLabs was founded by two technologists who believe data should do more than inform, it should inspire. After decades in architecture, consulting, and delivery, we saw a pattern, organisations had more data than ever, yet less clarity. We built aether DataLabs to change that, to connect the infinite potential of data with real world purpose. Like explorers mapping constellations, we uncover patterns that guide confident decisions and lasting impact. Our mission is simple bring the vastness of data down to earth, turning complexity into clarity and insight into action.</p>
        </div>

        <div class="section-image">
            <img src="assets/images/about-us.png" alt="About Aether DataLabs">
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
    const words = [
        "Born", "from", "decades", "of", "experience,",
        "aether", "DataLabs", "bridges", "the", "infinite", "and", "the", "tangible,"
    ];
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
            secondLine.style.transition = "opacity 1.2s ease-in-out";
        }
    }

    window.onload = typeEffect;
    </script>
</body>
</html>
