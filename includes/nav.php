<?php $current_page = basename($_SERVER['PHP_SELF'] ?? ''); ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7C2GKDJ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <header class="header" id="header">
        <div class="container">
            <div class="nav-brand">
                <a href="index.php">
                    <img src="assets/images/logo.png" alt="AetherDataLabs">
                </a>
            </div>

            <div class="nav-toggle" id="navToggle" aria-label="Toggle navigation" role="button">
                <span class="toggle-line"></span>
                <span class="toggle-line"></span>
                <span class="toggle-line"></span>
            </div>

            <nav class="nav-menu" id="navMenu" aria-label="Main navigation">
                <div class="nav-overlay"></div>
                <div class="nav-content">
                    <a href="index.php"       class="nav-link <?= $current_page === 'index.php'       ? 'active' : '' ?>" data-text="Home">Home</a>
                    <a href="about-us.php"    class="nav-link <?= $current_page === 'about-us.php'    ? 'active' : '' ?>" data-text="About">About Us</a>
                    <a href="services.php"    class="nav-link <?= $current_page === 'services.php'    ? 'active' : '' ?>" data-text="Services">Services</a>
                    <a href="technologies.php" class="nav-link <?= $current_page === 'technologies.php' ? 'active' : '' ?>" data-text="Technologies">Technologies</a>
                    <a href="contact-us.php"  class="nav-link <?= $current_page === 'contact-us.php'  ? 'active' : '' ?>" data-text="Contact Us">Contact Us</a>
                </div>
            </nav>
        </div>
    </header>
