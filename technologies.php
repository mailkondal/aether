<!DOCTYPE html>
<html lang="en">
<head>
    <title>Technologies - AetherDataLabs</title>
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
        #hero h1 { font-size: 15px; font-weight: bold; white-space: nowrap; }
        .hero h1 span { display: block; }

        .text-right {
            opacity: 0;
            animation: slideInRight 3s ease forwards;
            animation-delay: 4s;
        }

        @media (max-width: 768px) {
            #hero h1 { white-space: normal; display: flex; flex-direction: column; align-items: center; font-size: 1.4rem; text-align: center; }
            .hero h1 span { display: block; margin: 6px 0; }
            .nkr { display: none; }
        }

        /* Tech category grid */
        .data-section {
            position: relative;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 80px 60px;
            min-height: 100vh;
            color: #fff;
            overflow: hidden;
        }

        .story-bg-video {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .data-card {
            position: relative;
            z-index: 2;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 20px;
            max-height: 290px;
            min-height: 290px;
            overflow: hidden;
            text-align: center;
            padding: 40px 20px;
            transition: all 0.3s ease;
        }

        .data-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.3); }

        .data-card img { margin-bottom: 20px; filter: invert(0); }

        .data-card h3 { font-size: 1.3rem; margin-bottom: 10px; font-weight: 600; }

        .data-card p { font-size: 0.9rem; color: #ddd; line-height: 1.6; }

        @media (max-width: 992px) {
            .data-section { grid-template-columns: repeat(2, 1fr); padding: 60px 40px; }
        }

        @media (max-width: 600px) {
            .data-section { grid-template-columns: 1fr; padding: 40px 20px; }
            .data-card { padding: 30px 15px; }
            .data-card img { width: 50px; }
        }

        /* Tools slider */
        .tools-section {
            position: relative;
            width: 100%;
            padding: 80px 0;
            overflow: hidden;
            z-index: 1;
        }

        .tools-section video.bg-video {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: 0;
            opacity: 0.25;
        }

        .tools-slider { overflow: hidden; position: relative; z-index: 2; width: 100%; }

        .slide-track {
            display: flex;
            gap: 25px;
            width: calc(200%);
            animation: scroll 35s linear infinite;
        }

        @keyframes scroll {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .tool-card {
            flex: 0 0 auto;
            background-color: rgba(0,0,0,0.7);
            border-radius: 15px;
            width: 160px;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .tool-card:hover { transform: scale(1.05); border-color: rgba(255,255,255,0.3); }

        .tool-card img { width: 80%; height: auto; object-fit: contain; filter: brightness(0.9); }

        @media (max-width: 992px) {
            .tool-card { width: 130px; height: 110px; }
            .slide-track { animation: scroll 30s linear infinite; }
        }

        @media (max-width: 600px) {
            .tool-card { width: 110px; height: 90px; }
            .slide-track { gap: 15px; animation: scroll 25s linear infinite; }
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
                <span id="typed-text" class="text-center"></span>
                <span id="second-line" class="text-right" style="opacity:0;">
                    we use the right tools for the right job, tailored to your data, goals, and requirements.
                </span>
            </h1>
        </div>
    </section>

    <!-- Technology Category Cards -->
    <section class="data-section">
        <div class="story-bg-video">
            <video autoplay muted loop playsinline controlslist="nodownload" style="width:100%; height:100%; object-fit:cover;">
                <source src="assets/video/background-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-overlay"></div>

        <div class="data-card">
            <img src="assets/images/picture1.png" alt="Data Platform">
            <h3>Data Platform</h3>
            <p>Azure Synapse Analytics, Snowflake, Redshift, BigQuery, Databricks, SQL Server</p>
        </div>

        <div class="data-card">
            <img src="assets/images/picture2.png" alt="Data Integration">
            <h3>Data Integration</h3>
            <p>Azure Data Factory, AWS Glue, Google Data Fusion, Informatica, IBM DataStage, Oracle Data Integrator</p>
        </div>

        <div class="data-card">
            <img src="assets/images/picture3.png" alt="Relational Database Design">
            <h3>Relational Database Design</h3>
            <p>SQL Server, Amazon RDS, PostgreSQL, MySQL, Teradata</p>
        </div>

        <div class="data-card">
            <img src="assets/images/picture4.png" alt="Data Domain">
            <h3>Data Domain</h3>
            <p>Amazon S3, DynamoDB, Neptune, Azure Cosmos DB, ADLS Gen2, Apache Gremlin, MongoDB, Neo4j</p>
        </div>

        <div class="data-card">
            <img src="assets/images/picture5.png" alt="Cloud Ecosystem">
            <h3>Cloud Ecosystem</h3>
            <p>Azure, AWS, Google Cloud, Oracle Cloud</p>
        </div>

        <div class="data-card">
            <img src="assets/images/picture6.png" alt="Analytics &amp; BI">
            <h3>Analytics &amp; BI</h3>
            <p>Power BI, Qlik Sense, Looker, Tableau, AWS QuickSight</p>
        </div>
    </section>

    <!-- Logo Slider -->
    <section class="tools-section">
        <video class="bg-video" autoplay muted loop playsinline>
            <source src="assets/video/background-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="tools-slider">
            <div class="slide-track">
                <div class="tool-card"><img src="assets/images/ae1.png" alt="Databricks"></div>
                <div class="tool-card"><img src="assets/images/ar-1.png" alt="Azure Synapse"></div>
                <div class="tool-card"><img src="assets/images/ar-2.png" alt="Snowflake"></div>
                <div class="tool-card"><img src="assets/images/ar-3.png" alt="Amazon Redshift"></div>
                <div class="tool-card"><img src="assets/images/ar-4.png" alt="BigQuery"></div>
                <div class="tool-card"><img src="assets/images/ar-5.png" alt="Azure Data Factory"></div>
                <div class="tool-card"><img src="assets/images/ar-6.png" alt="Informatica"></div>
                <div class="tool-card"><img src="assets/images/ar-7.png" alt="Microsoft SQL"></div>
                <div class="tool-card"><img src="assets/images/ar-8.png" alt="BigQuery"></div>
                <div class="tool-card"><img src="assets/images/ar-9.png" alt="Azure Data Factory"></div>
                <div class="tool-card"><img src="assets/images/ar-10.png" alt="Informatica"></div>
                <div class="tool-card"><img src="assets/images/ar-11.png" alt="Microsoft SQL"></div>
                <!-- Duplicate set for seamless loop -->
                <div class="tool-card"><img src="assets/images/ae1.png" alt="Databricks"></div>
                <div class="tool-card"><img src="assets/images/ae2.png" alt="Azure Synapse"></div>
                <div class="tool-card"><img src="assets/images/ae3.png" alt="Snowflake"></div>
                <div class="tool-card"><img src="assets/images/ae4.png" alt="Amazon Redshift"></div>
                <div class="tool-card"><img src="assets/images/ae5.png" alt="BigQuery"></div>
                <div class="tool-card"><img src="assets/images/ae6.png" alt="Azure Data Factory"></div>
                <div class="tool-card"><img src="assets/images/ae7.png" alt="Informatica"></div>
                <div class="tool-card"><img src="assets/images/ae8.png" alt="Microsoft SQL"></div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
    const words = ["At", "aether", "DataLabs,", "we", "work", "across", "the", "full", "data", "ecosystem,"];
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
