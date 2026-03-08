<?php
$meta_description = 'Data engineering, platform modernisation, insights and reporting, advanced analytics enablement, and consulting services — all tailored to your business needs.';
$og_title         = 'Services — AetherDataLabs';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Services - AetherDataLabs</title>
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
            .hide-on-mobile { display: none; }
        }

        /* Service card sections */
        .data-section {
            position: relative;
            width: 100%;
            min-height: 100vh;
            padding: 60px 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            color: #fff;
            overflow: hidden;
        }

        .video-background {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .video-background video { width: 100%; height: 100%; object-fit: cover; }

        .data-section .overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .data-card {
            position: relative;
            z-index: 2;
            color: #fff;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            padding: 30px;
            margin: 20px;
            min-height: unset;
            max-height: unset;
            overflow: hidden;
            width: 560px;
            max-width: 100%;
            line-height: 1.6;
            box-shadow: 0 0 20px rgba(255,255,255,0.03);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1.2s ease forwards;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .data-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 212, 170, 0.3);
            box-shadow: 0 0 30px rgba(0, 212, 170, 0.08), 0 20px 40px rgba(0,0,0,0.4);
        }

        @keyframes fadeUp {
            0%   { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .data-card:nth-child(3) { animation-delay: 0.4s; }

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
                    we transform infinite data into grounded insights that help businesses thrive.
                </span>
            </h1>
        </div>
    </section>

    <!-- Data Engineering + Data Platform -->
    <section class="data-section">
        <div class="video-background">
            <video autoplay muted loop playsinline controlslist="nodownload" style="width:100%; height:100%; object-fit:cover;">
                <source src="assets/video/background-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="overlay"></div>

        <div class="data-card">
            <h2>Data Engineering</h2>
            <div class="card-icon">
                <img src="assets/images/data-engineering.png" alt="Data Engineering">
            </div>
            <p>Just as rivers gather streams into a powerful current, our data engineering brings together information from diverse sources and turns it into a steady, trusted flow. Along the way, raw data is cleansed, transformed, and enriched fueling your warehouse, lake, and analytics with quality you can rely on.</p>
            <p>We design scalable, efficient pipelines so you have the right data at the right time—automated, observable, and tailored to your needs:</p>
            <ul>
                <li>ETL/ELT pipelines</li>
                <li>Cloud data architecture (Azure, AWS, GCP)</li>
                <li>Real-time &amp; batch processing</li>
                <li>Data platform &amp; data lake solutions</li>
            </ul>
        </div>

        <div class="data-card">
            <h2>Data Platform Modernization</h2>
            <div class="card-icon">
                <img src="assets/images/data-platform.png" alt="Data Platform Modernization">
            </div>
            <p>A caterpillar evolves into a butterfly, gaining agility and freedom to soar. Likewise, our modernization services transform rigid legacy platforms into scalable, cloud-native architectures. This evolution unlocks speed, flexibility, and the ability to explore new frontiers of data innovation.</p>
            <p>We prepare and optimise your data for advanced analytics, AI, and machine learning. Our solutions set the stage for:</p>
            <ul>
                <li>Predictive &amp; prescriptive analytics setup</li>
                <li>Feature engineering for AI/ML</li>
                <li>AI and MLOps framework with governance and guardrails</li>
            </ul>
        </div>
    </section>

    <!-- Insights + Advanced Analytics -->
    <section class="data-section">
        <div class="video-background">
            <video autoplay muted loop playsinline controlslist="nodownload" style="width:100%; height:auto; object-fit:cover;">
                <source src="assets/video/background-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="overlay"></div>

        <div class="data-card">
            <h2>Insights &amp; Reporting</h2>
            <div class="card-icon">
                <img src="assets/images/insights-reporting.png" alt="Insights &amp; Reporting">
            </div>
            <p>Tree rings are nature's timeline clear, comparable, auditable. Our Insights &amp; Reporting do the same turn raw history into trusted trends, anomalies, and root causes. Like rings that never overwrite the past, our versioned metrics preserve lineage and compound value over time.</p>
            <p>We convert numbers into narratives through interactive dashboards and enterprise reporting. We help leaders decide with confidence:</p>
            <ul>
                <li>Power BI, Tableau, Qlik, Looker studio, Excel</li>
                <li>Executive dashboards &amp; KPI tracking</li>
                <li>Automated enterprise reporting</li>
                <li>Self-service analytics</li>
            </ul>
        </div>

        <div class="data-card">
            <h2>Advanced Analytics Enablement</h2>
            <div class="card-icon">
                <img src="assets/images/advanced-analytics-enablement.png" alt="Advanced Analytics Enablement">
            </div>
            <p>Birds migrate in formation reading the season ahead and flying farther together. Our advanced analytics do the same: machine learning and predictive models that anticipate demand, detect anomalies, and surface new opportunities, so your business flies smarter and further.</p>
            <p>We also modernise your data ecosystem for agility, scalability, and performance built for innovation and resilience:</p>
            <ul>
                <li>Legacy platform migration &amp; cloud transformation</li>
                <li>Modern data Lakehouse architecture</li>
                <li>Scalable storage &amp; compute optimization</li>
                <li>Platform automation &amp; infrastructure-as-code</li>
                <li>Security, compliance &amp; access control frameworks</li>
            </ul>
        </div>
    </section>

    <!-- Consulting and Advisory -->
    <section class="data-section">
        <div class="video-background">
            <video autoplay muted loop playsinline controlslist="nodownload" style="width:100%; height:100%; object-fit:cover;">
                <source src="assets/video/background-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="overlay"></div>

        <div class="data-card">
            <h2>Consulting and Advisory</h2>
            <div class="card-icon">
                <img src="assets/images/consulting-and-advisory.png" alt="Consulting and Advisory">
            </div>
            <p>Dolphins embody intelligence, clarity, and teamwork—seeing beneath the surface with precise echolocation. Our Consulting &amp; Advisory mirrors that: we surface blind spots, align teams like a coordinated pod, and translate signals into confident strategy. We don't just advise, we navigate complexity with you, adapting quickly and compounding value for long-term success.</p>
            <p>Our experts guide every step of your data journey from strategy to optimisation and measurable outcomes:</p>
            <ul>
                <li>Data strategy &amp; roadmap</li>
                <li>Data governance &amp; stewardship</li>
                <li>Cloud cost optimisation</li>
                <li>Performance tuning</li>
                <li>DevOps for data (CI/CD, monitoring)</li>
            </ul>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
    const words = ["From", "the", "vastness", "of", "aether,", "to", "the", "roots", "of", "earth."];
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
