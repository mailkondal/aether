<?php
// Page-level variables with defaults — set these BEFORE including this file.
// $meta_description  string  Page-specific description (150–160 chars)
// $og_title          string  Open Graph title (defaults to <title>)
// $og_image          string  Absolute URL to share image
// $canonical         string  Canonical URL for this page

$base_url      = 'https://' . ($_SERVER['HTTP_HOST'] ?? 'aetherdatalabs.com.au');
$current_path  = '/' . basename($_SERVER['PHP_SELF'] ?? 'index.php');

$meta_description = $meta_description ?? 'AetherDataLabs — Australian data engineering and analytics consultancy. We turn raw data into real value through modern platforms, AI, and seamless integration.';
$og_title         = $og_title         ?? ($page_title ?? 'AetherDataLabs');
$og_image         = $og_image         ?? $base_url . '/assets/images/logo.png';
$canonical        = $canonical        ?? $base_url . $current_path;
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO -->
    <meta name="description" content="<?= htmlspecialchars($meta_description) ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

    <!-- Open Graph -->
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="<?= htmlspecialchars($og_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($meta_description) ?>">
    <meta property="og:image"       content="<?= htmlspecialchars($og_image) ?>">
    <meta property="og:url"         content="<?= htmlspecialchars($canonical) ?>">
    <meta property="og:site_name"   content="AetherDataLabs">

    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="<?= htmlspecialchars($og_title) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($meta_description) ?>">
    <meta name="twitter:image"       content="<?= htmlspecialchars($og_image) ?>">

    <!-- Icons -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favi-final11.png">
    <meta name="theme-color" content="#000000">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T7C2GKDJ');</script>

    <!-- Styles -->
    <link rel="stylesheet" href="styles.css">
