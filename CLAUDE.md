# AetherDataLabs — Claude Code Guide

## Project Overview
Corporate marketing website for AetherDataLabs, a data engineering and analytics consultancy based in Australia. Built with PHP (server-side rendering) and vanilla JS/CSS.

## Architecture

### Tech Stack
- **Backend:** PHP (no framework) — plain `.php` files served directly
- **Styling:** `styles.css` (global, includes CSS custom properties) + page-scoped `<style>` blocks for page-specific rules
- **JS:** `script.js` (global animations/scroll/video pause) + inline `<script>` per page (typing animations)
- **Email:** PHPMailer (in `PHPMailer/` directory) — used only in `submit_form.php`
- **Analytics:** Google Tag Manager (GTM-T7C2GKDJ) — loaded via `includes/head.php` on all pages

### Directory Structure
```
aether/
├── includes/           # Shared PHP partials (include in every page)
│   ├── head.php        # <meta>, CSS link, favicon, GTM script
│   ├── nav.php         # Header + navigation (active state via PHP_SELF), GTM noscript
│   └── footer.php      # Footer, floating mail SVG icon, script.js include
├── assets/
│   ├── images/         # All PNG assets (logos, service icons, tech logos)
│   └── video/          # background-video.mp4
├── index.php           # Homepage
├── about-us.php        # About page
├── services.php        # Services page
├── technologies.php    # Tech stack page
├── contact-us.php      # Contact form page (CSRF token generated here)
├── thank-you.php       # Post-form confirmation (matches site design)
├── 404.php             # Custom 404 error page
├── submit_form.php     # Form handler — POST only, CSRF + sanitisation + PHPMailer
├── .htaccess           # ErrorDocument 404, security headers, deny .env/includes
├── styles.css          # Global stylesheet (CSS variables at top)
└── script.js           # Global JS (preloader, scroll animations, nav toggle, video pause)
```

## Page Template Pattern
All pages follow this structure. Set SEO variables **before** including `head.php`:

```php
<?php
$meta_description = 'Page-specific description (150–160 chars).';
$og_title         = 'Page Title — AetherDataLabs';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page Title - AetherDataLabs</title>
    <?php include 'includes/head.php'; ?>
    <style>/* page-specific CSS only */</style>
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <!-- page content -->

    <?php include 'includes/footer.php'; ?>

    <script>/* page-specific JS only (typing animations) */</script>
</body>
</html>
```

## Asset Paths
- Images: `assets/images/filename.png`
- Video: `assets/video/background-video.mp4`
- Always use root-relative paths (pages are all in root, includes are in `includes/`)

## CSS Conventions
- **Global / shared styles** → `styles.css`
- **Page-specific styles** → inline `<style>` block in the page `<head>`
- Do not add page-specific styles to `styles.css`
- Do not add global/shared styles as inline styles in pages
- Key shared classes: `.story`, `.story-bg-video`, `.hero-overlay`, `.full-height-section`, `.hide-on-mobile`, `.floating-icon`, `.nav-brand`, `.video-pause-btn`, `@keyframes float-pulse/slideInLeft/slideInRight`
- CSS custom properties are defined in `:root` at the top of `styles.css` — use them instead of hardcoded values

## JS Conventions
- **Global behaviour** (preloader, scroll animations, nav toggle) → `script.js`
- **Page-specific** (hero typing animation words, second-line text) → inline `<script>` before `</body>`
- Typing animation pattern: word-by-word with `typeEffect()`, then fade in `#second-line`

## Form Handling
- `contact-us.php` generates a one-time CSRF token in `$_SESSION` and POSTs to `submit_form.php`
- `submit_form.php`: validates CSRF, sanitises all inputs (`strip_tags` + newline removal + `mb_substr` + `htmlspecialchars`), validates email via `filter_var`, sends via PHPMailer
- SMTP credentials loaded from `.env` via `includes/env.php` (no Composer required)
- On success: redirects to `thank-you.php`; on error: redirects to `contact-us.php?error=<key>`
- PHPMailer location: `PHPMailer/src/`

## Running Locally
PHP built-in server from project root:
```bash
php -S localhost:8000
```
Requires PHP installed. Recommended: [Laragon](https://laragon.org/) on Windows.

## What NOT to Do
- Do not put content outside `<html>` tags
- Do not use Tailwind classes — Tailwind is not active (scaffold removed)
- Do not duplicate nav or footer HTML in pages — always use the includes
- Do not reference images from root — always use `assets/images/` prefix
- Do not add Font Awesome — it has been removed; use inline SVG for icons
- Do not hardcode GTM ID — it lives only in `includes/head.php` and `includes/nav.php`
- Do not use `.ngk`, `.gvk`, `.zxr`, `.nkr` — these were renamed to semantic equivalents
