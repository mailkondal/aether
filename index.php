<!DOCTYPE html>
<html lang="en">
<head>
    <title>AetherDataLabs - When Data Meets Infinite</title>
    <?php include 'includes/head.php'; ?>
    <style>
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }
        .hero h1 { font-weight: bold; white-space: nowrap; }
        .hero h1 span { display: inline-block; }

        .text-right {
            opacity: 0;
            animation: slideInRight 3s ease forwards;
            animation-delay: 4s;
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }

        .slide-in-left  { animation: slideInLeft  6s ease forwards; }
        .slide-in-right { animation: slideInRight 6s ease forwards; }

        @media (max-width: 768px) {
            .hero h1 {
                white-space: normal;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .hero h1 span { display: block; margin: 5px 0; }
        }

        .section-title.animate-on-scroll {
            font-size: 30px;
            font-weight: 600;
            line-height: 1.4;
            text-align: center;
        }

        .zxr { font-size: 30px !important; margin-top: 20px !important; }

        @media (max-width: 768px) {
            .gvk { font-size: 30px !important; }
        }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="preloader-content">
            <div class="logo-animation">
                <img src="assets/images/logo.png">
            </div>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
        </div>
    </div>

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
                <span class="text-right"> Knowledge becomes boundless.</span>
            </h1>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story section-animate ngk" id="story">
        <div class="story-bg-video">
            <video autoplay muted loop playsinline controlslist="nodownload" style="width:100%; height:100%; object-fit:cover;">
                <source src="assets/video/background-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-overlay"></div>
        <div class="container">
            <h2 class="section-title animate-on-scroll gvk">
                <span class="title-word">The</span>
                <span class="title-word">Story</span>
            </h2>
            <br>
            <div class="story-content">
                <p class="story-paragraph" id="para1">
                    Not long ago data was everywhere yet out of reach—endless spreadsheets, scattered systems, and disconnected platforms.
                    Teams worked hard to make sense of it but the pieces never quite fit together, so decisions were made with only fragments of the truth.
                    Then something changed—when data connected through modern platforms, it no longer had boundaries. Suddenly it could move, connect, and grow without limits.
                </p>
                <p class="story-paragraph" id="para2">
                    What once felt overwhelming became a source of clarity. Patterns appeared, answers emerged, and entirely new questions could be asked and solved.
                    In that moment data met the infinite. Knowledge stopped being confined to what we already knew and became limitless—helping people imagine, create, and decide with confidence.
                </p>
            </div>
        </div>
    </section>

    <!-- What We Do Section -->
    <section class="story what-we-do section-animate ngk">
        <div class="story-bg-video">
            <video autoplay muted loop playsinline controlslist="nodownload" style="width:100%; height:100%; object-fit:cover;">
                <source src="assets/video/background-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-overlay"></div>
        <div class="container">
            <h2 class="section-title animate-on-scroll">
                <span class="title-word">What</span>
                <span class="title-word">We</span>
                <span class="title-word">Do</span>
            </h2>
            <div class="services-grid cont">
                <div class="service-item animate-on-scroll" data-delay="0">
                    <h3 class="service-title">
                        <span class="service-word">We</span>
                        <span class="service-word">turn</span>
                        <span class="service-word">raw</span>
                        <span class="service-word">data</span>
                        <span class="service-word">into</span>
                        <span class="service-word">real</span>
                        <span class="service-word">value</span>
                    </h3>
                    <p class="service-description animate-on-scroll" data-delay="0.2">
                        <span class="desc-line">We cut through complexities to provide clear insights that drive innovation, smarter decisions, and faster growth.</span>
                    </p>
                </div>
                <div class="service-item animate-on-scroll" data-delay="0.3">
                    <h3 class="service-title">
                        <span class="service-word">Seamless</span>
                        <span class="service-word">data</span>
                        <span class="service-word">integration</span>
                        <span class="service-word">for</span>
                        <span class="service-word">every</span>
                        <span class="service-word">application</span>
                    </h3>
                    <p class="service-description animate-on-scroll" data-delay="0.5">
                        <span class="desc-line">We deliver seamless data integration that keeps upstream and downstream apps in sync. Our pipelines ensure accurate, timely data across systems, so every application always has what it needs.</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Summary Section -->
    <section class="story summary section-animate">
        <div class="story-bg-video">
            <video autoplay muted loop playsinline controlslist="nodownload" style="width:100%; height:100%; object-fit:cover;">
                <source src="assets/video/background-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-overlay"></div>
        <div class="container">
            <h2 class="section-title animate-on-scroll">
                <span class="title-word">Summary</span>
            </h2>
            <br>
            <div class="summary-content">
                <p class="summary-text animate-on-scroll">
                    <span class="summary-line">At AetherDataLabs, we're more than a data company, we're your partner in building the solutions you need.</span>
                    <span class="summary-line">Whether it's data engineering, integration, reporting, or AI Powered agents,</span>
                    <span class="summary-line">we guide you, solve challenges together, and bring your ideas to life with confidence.</span>
                </p>
            </div>
        </div>
        <div class="footer-section" style="text-align: center;">
            <h3 class="footer-title animate-on-scroll zxr">Get in Touch</h3>
            <a href="mailto:info@aetherdatalabs.com.au" class="footer-contact animate-on-scroll" data-delay="0.2">info@aetherdatalabs.com.au</a>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
    // Hero typing animation
    const words = ["When", "data", "meets", "infinite,"];
    const typedText = document.getElementById("typed-text");
    let wordIndex = 0, charIndex = 0;

    function typeEffect() {
        if (wordIndex < words.length) {
            if (charIndex < words[wordIndex].length) {
                typedText.innerHTML += words[wordIndex].charAt(charIndex);
                charIndex++;
                setTimeout(typeEffect, 80);
            } else {
                typedText.innerHTML += " ";
                wordIndex++;
                charIndex = 0;
                setTimeout(typeEffect, 400);
            }
        }
    }

    window.onload = () => { typeEffect(); };

    // Story paragraph typing animation
    function typeText(elementId, speed, callback) {
        const el = document.getElementById(elementId);
        const text = el.textContent.trim();
        el.textContent = "";
        el.style.opacity = 1;
        let i = 0;
        function typing() {
            if (i < text.length) {
                el.textContent += text.charAt(i);
                i++;
                setTimeout(typing, speed);
            } else {
                el.style.borderRight = "none";
                if (callback) callback();
            }
        }
        typing();
    }

    window.addEventListener("load", () => {
        typeText("para1", 15, () => {
            setTimeout(() => typeText("para2", 15), 400);
        });
    });
    </script>
</body>
</html>
