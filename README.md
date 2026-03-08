# AetherDataLabs — Website

Corporate marketing website for **AetherDataLabs**, an Australian data engineering and analytics consultancy. Built with PHP, vanilla CSS, and JavaScript.

> *When data meets infinite, knowledge becomes boundless.*

---

## Table of Contents

- [Getting Started](#getting-started)
- [Project Structure](#project-structure)
- [Development Workflow](#development-workflow)
- [PHP Best Practices](#php-best-practices)
- [Frontend Best Practices](#frontend-best-practices)
- [Security](#security)
- [Performance](#performance)
- [Deployment](#deployment)
- [Contributing](#contributing)

---

## Getting Started

### Prerequisites

| Tool | Version | Purpose |
|------|---------|---------|
| PHP | 8.1+ | Server-side rendering |
| Composer | Latest | PHP dependency management (future use) |
| Node.js | 18+ | Frontend tooling (Vite/React — currently scaffolded) |

### Local Development

**Option 1 — PHP built-in server (simplest)**
```bash
php -S localhost:8000
```
Open `http://localhost:8000`

**Option 2 — Laragon (recommended on Windows)**
1. Install [Laragon](https://laragon.org/download/)
2. Place the project in `C:\laragon\www\aether`
3. Start Laragon → visit `http://aether.test`

**Option 3 — XAMPP / MAMP**
Place the project in `htdocs/` (XAMPP) or `htdocs/` (MAMP) and start Apache.

### Environment Setup

Copy `.env.example` to `.env` and fill in SMTP credentials:
```bash
cp .env.example .env
```

```ini
SMTP_HOST=mail.yourdomain.com
SMTP_USER=you@yourdomain.com
SMTP_PASS=yourpassword
SMTP_PORT=465
MAIL_TO=info@aetherdatalabs.com.au
```

> **Never commit `.env` to version control.** It is listed in `.gitignore`.

---

## Project Structure

```
aether/
├── includes/                   # Shared PHP partials
│   ├── head.php                # <meta>, CSS, favicon, CDN links
│   ├── nav.php                 # Header and navigation
│   └── footer.php              # Footer, floating icon, global script
│
├── assets/
│   ├── images/                 # All image assets (PNG, SVG)
│   └── video/                  # Background video files
│
├── index.php                   # Homepage
├── about-us.php                # About page
├── services.php                # Services page
├── technologies.php            # Technologies page
├── contact-us.php              # Contact form
├── thank-you.php               # Post-submission confirmation
├── submit_form.php             # Form handler (POST only)
│
├── styles.css                  # Global stylesheet
├── script.js                   # Global JavaScript
│
├── PHPMailer/                  # Email library
├── src/                        # Vite/React scaffold (future use)
├── .env                        # Secrets — NOT committed
├── .gitignore
├── CLAUDE.md                   # AI assistant context
└── README.md
```

---

## Development Workflow

### Adding a New Page

1. Create `new-page.php` in the project root
2. Use the standard template:

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

    <!-- page content here -->

    <?php include 'includes/footer.php'; ?>

    <script>/* page-specific JS only */</script>
</body>
</html>
```

3. Add the page link to `includes/nav.php`

### Editing the Navigation

Only edit `includes/nav.php` — the nav is shared across all pages. Never copy-paste nav HTML into individual pages.

### Adding Images

Place images in `assets/images/` and reference them as:
```html
<img src="assets/images/your-image.png" alt="Descriptive alt text">
```

---

## PHP Best Practices

### 1. Never Echo User Input Directly

Always sanitise output to prevent XSS:

```php
// Bad
echo $_POST['name'];

// Good
echo htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
```

### 2. Validate All Form Inputs Server-Side

Client-side validation (HTML5 `required`, JS) is UX only — never trust it for security:

```php
$name    = trim($_POST['name'] ?? '');
$email   = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$message = trim($_POST['message'] ?? '');

if (!$name || !$email || !$message) {
    header("Location: contact-us.php?error=validation");
    exit();
}
```

### 3. Use Environment Variables for Secrets

Never hardcode credentials in PHP files:

```php
// Bad — credentials in source code
$mail->Password = 'MyPassword123';

// Good — loaded from environment
$mail->Password = $_ENV['SMTP_PASS'];
```

Load `.env` using a library like `vlucas/phpdotenv` (Composer):
```bash
composer require vlucas/phpdotenv
```

```php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
```

### 4. Use `exit()` After Every Redirect

Without `exit()`, PHP continues executing after `header("Location: ...")`:

```php
// Bad
header("Location: thank-you.php");
// code here still runs!

// Good
header("Location: thank-you.php");
exit();
```

### 5. Separate Concerns

| Layer | Where it lives |
|-------|---------------|
| Presentation (HTML/CSS) | `.php` page files |
| Shared layout | `includes/` |
| Business logic | Dedicated PHP files / classes |
| Data access | Separate from presentation |

As the project grows, move business logic (email sending, validation) out of page files and into dedicated classes under a `src/` or `lib/` directory.

### 6. Use Strict Types

Add at the top of PHP logic files:

```php
<?php
declare(strict_types=1);
```

### 7. Handle Errors Gracefully

Never display raw PHP errors to users in production. Set in `php.ini` or at the top of your entry file:

```php
// Development
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Production
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', '/path/to/error.log');
```

---

## Frontend Best Practices

### CSS

- **Global styles** belong in `styles.css`
- **Page-specific styles** go in an inline `<style>` block in that page's `<head>` only
- Use CSS custom properties (variables) for repeated values:

```css
:root {
    --color-bg: #000000;
    --color-text: #ffffff;
    --color-overlay: rgba(0, 0, 0, 0.6);
    --font-primary: "Lucida Console", monospace;
}
```

- Avoid `!important` unless absolutely necessary (currently overused — clean up gradually)
- Never use inline `style=""` attributes for anything beyond truly one-off values

### JavaScript

- All global behaviour lives in `script.js`
- Page-specific JS (e.g. typing animation words) stays as a `<script>` at the bottom of that page only
- Prefer `const` and `let` over `var`
- Always add `null` checks before DOM manipulation:

```js
// Bad — throws if element doesn't exist
document.getElementById('typed-text').innerHTML = '';

// Good
const el = document.getElementById('typed-text');
if (el) el.innerHTML = '';
```

### HTML

- Always include descriptive `alt` attributes on images (accessibility + SEO)
- Keep all content inside `<html>` — never place scripts or styles after `</html>`
- Use semantic HTML5 elements (`<header>`, `<nav>`, `<section>`, `<footer>`, `<main>`)

### Accessibility

- Ensure colour contrast ratios meet WCAG 2.1 AA (4.5:1 for body text)
- Navigation must be keyboard-accessible
- Videos must have `muted` and the option to pause (consider adding a pause button)
- All form inputs must have associated `<label>` elements

---

## Security

### Checklist

- [ ] All `$_POST` / `$_GET` values sanitised before use
- [ ] SMTP credentials in `.env`, not in source code
- [ ] `.env` listed in `.gitignore`
- [ ] Form submissions validated server-side
- [ ] No raw PHP errors displayed to end users in production
- [ ] HTTPS enforced in production (via server config or `.htaccess`)
- [ ] Content Security Policy (CSP) header set
- [ ] `X-Frame-Options: DENY` header set to prevent clickjacking

### Recommended `.htaccess` (Apache)

```apache
# Force HTTPS
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Security headers
Header always set X-Frame-Options "DENY"
Header always set X-Content-Type-Options "nosniff"
Header always set Referrer-Policy "strict-origin-when-cross-origin"

# Prevent access to sensitive files
<FilesMatch "\.(env|log|md|json|lock)$">
    Order allow,deny
    Deny from all
</FilesMatch>

# Prevent directory listing
Options -Indexes
```

---

## Performance

### Images

- Compress all PNGs before committing (use [Squoosh](https://squoosh.app/) or `pngquant`)
- Consider converting large images to WebP format
- Always specify `width` and `height` attributes to prevent layout shift

### Video

- The background video (`background-video.mp4`) is a large asset — ensure it is compressed
- Recommended tool: HandBrake (H.264, CRF 28, 720p for background use)
- Consider adding a `poster` attribute for the initial frame while video loads:

```html
<video autoplay muted loop playsinline poster="assets/images/video-poster.jpg">
    <source src="assets/video/background-video.mp4" type="video/mp4">
</video>
```

### CSS/JS

- Minify `styles.css` and `script.js` for production
- Consider bundling via Vite (already scaffolded) when React/TS features are adopted

---

## Deployment

### Shared Hosting / cPanel

1. Upload all files via FTP or cPanel File Manager
2. Ensure PHP 8.1+ is selected in cPanel → PHP Version Manager
3. Set file permissions: directories `755`, files `644`
4. Upload `.env` separately (do not include in any zip/archive committed to git)
5. Verify PHPMailer path (`PHPMailer/src/`) is accessible

### VPS / Cloud

Recommended stack: **Nginx + PHP-FPM**

```nginx
server {
    listen 443 ssl;
    server_name aetherdatalabs.com.au www.aetherdatalabs.com.au;
    root /var/www/aether;
    index index.php;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location ~ /\.(env|git|md) {
        deny all;
    }
}
```

### Pre-deployment Checklist

- [ ] `.env` configured on server (not uploaded from local)
- [ ] PHP error display set to `0` in production
- [ ] Error logging enabled and log path writable
- [ ] HTTPS certificate installed (Let's Encrypt / Certbot)
- [ ] Test contact form end-to-end (SMTP send)
- [ ] Test all page links (no broken paths)
- [ ] Compress images and video
- [ ] Remove any debug `var_dump()` / `console.log()` statements

---

## Contributing

### Branch Strategy

```
main          ← production-ready code only
dev           ← integration branch
feature/xxx   ← individual features / pages
fix/xxx       ← bug fixes
```

### Commit Message Convention

Follow [Conventional Commits](https://www.conventionalcommits.org/):

```
feat: add services page hero typing animation
fix: correct image path in technologies.php
style: consolidate floating-icon CSS into styles.css
refactor: extract nav into includes/nav.php
docs: update README deployment section
```

### Code Review Checklist

- [ ] No credentials or secrets in code
- [ ] All images in `assets/images/`, video in `assets/video/`
- [ ] Page uses `includes/head.php`, `includes/nav.php`, `includes/footer.php`
- [ ] No styles added after `</html>`
- [ ] `alt` attributes on all images
- [ ] Tested on mobile viewport (375px)

---

## Contact

**AetherDataLabs**
[info@aetherdatalabs.com.au](mailto:info@aetherdatalabs.com.au)
