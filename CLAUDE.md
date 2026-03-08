# AetherDataLabs — Claude Code Guide

## Project Overview
Corporate marketing website for AetherDataLabs, a data engineering and analytics consultancy based in Australia. Built with PHP (server-side rendering) and vanilla JS/CSS. Vite/React tooling exists but is currently unused scaffolding.

## Architecture

### Tech Stack
- **Backend:** PHP (no framework) — plain `.php` files served directly
- **Styling:** `styles.css` (global) + page-scoped `<style>` blocks for page-specific rules
- **JS:** `script.js` (global animations/scroll) + inline `<script>` per page (typing animations)
- **Email:** PHPMailer (in `PHPMailer/` directory) — used only in `submit_form.php`
- **Unused:** Vite, React, TypeScript, Tailwind (`src/`, `package.json`, `vite.config.ts`) — do not remove, may be used later

### Directory Structure
```
aether/
├── includes/           # Shared PHP partials (include in every page)
│   ├── head.php        # <meta>, CSS links, favicon, Font Awesome CDN
│   ├── nav.php         # Header + navigation
│   └── footer.php      # Footer, floating mail icon, script.js include
├── assets/
│   ├── images/         # All PNG assets (logos, service icons, tech logos)
│   └── video/          # background-video.mp4
├── index.php           # Homepage
├── about-us.php        # About page
├── services.php        # Services page
├── technologies.php    # Tech stack page
├── contact-us.php      # Contact form page
├── thank-you.php       # Post-form redirect (standalone, uses Bootstrap CDN)
├── submit_form.php     # Form handler — POST only, uses PHPMailer
├── styles.css          # Global stylesheet
└── script.js           # Global JS (preloader, scroll animations, nav toggle)
```

## Page Template Pattern
Every page (except `thank-you.php`) follows this structure:

```php
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
- Key shared classes: `.story`, `.story-bg-video`, `.hero-overlay`, `.ngk`, `.floating-icon`, `.nav-brand`, `@keyframes roll/slideInLeft/slideInRight`

## JS Conventions
- **Global behaviour** (preloader, scroll animations, nav toggle) → `script.js`
- **Page-specific** (hero typing animation words, second-line text) → inline `<script>` before `</body>`
- Typing animation pattern: word-by-word with `typeEffect()`, then fade in `#second-line`

## Form Handling
- `contact-us.php` POSTs to `submit_form.php`
- `submit_form.php` uses PHPMailer with SMTP — credentials are hardcoded (TODO: move to `.env`)
- On success: redirects to `thank-you.php`
- PHPMailer location: `PHPMailer/src/`

## Running Locally
PHP built-in server from project root:
```bash
php -S localhost:8000
```
Requires PHP installed. Recommended: [Laragon](https://laragon.org/) on Windows.

## What NOT to Do
- Do not modify `thank-you.php` structure — it is a standalone Bootstrap page
- Do not put content outside `<html>` tags (was a bug in the original code, now fixed)
- Do not use Tailwind classes — Tailwind is not compiled/active
- Do not duplicate nav or footer HTML in pages — always use the includes
- Do not reference images from root — always use `assets/images/` prefix
