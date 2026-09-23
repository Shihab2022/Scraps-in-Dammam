# Scraps Buyer in Saudi Arabia — Scrap Buying Website (PHP)

A complete, production-ready scrap-buying business website for a scrap metal company operating in
**Mecca, Jeddah and Taif, Saudi Arabia** — built with **PHP 8.2+, MySQL/MariaDB, HTML5, CSS3
and vanilla JavaScript**.

The information architecture, conversion flow and professional quality follow the reference pattern of
`atozscrapbuyersa.com`, but with **100% original branding, original placeholder images (SVG), original
content and no third-party assets**.

---

## Features

| Area | Details |
|---|---|
| Pages | Home, About, Contact, Services, Pickup, How It Works, FAQ, Privacy, Terms, Thank-You, 404 |
| Scrap pages | Metal, Iron & Steel, Copper, Aluminum, Cable & Wire, AC & Appliances, Industrial, Cars, Construction (9 SEO landing pages) |
| Location pages | Mecca, Jeddah, Taif (unique content per city) |
| Conversion | Call button, floating + sticky WhatsApp, photo-quote CTAs, pickup & industrial forms |
| Forms | Pickup, Industrial — with CSRF, honeypot, server-side validation, rate limiting and multi-photo uploads |
| Database | MySQL via PDO prepared statements, with **JSON fallback** when the DB is unavailable |
| Email | `log`, `mail` or SMTP (PHPMailer) drivers via `.env` |
| Admin | Login, dashboard, request inbox, photo gallery, status updates, delete, FAQ/testimonial/service/location managers, company settings |
| SEO | Unique titles/descriptions, canonical URLs, Open Graph + Twitter cards, JSON-LD `@graph` (WebSite, LocalBusiness, Service, FAQPage, BreadcrumbList), generated sitemap.xml with image entries, robots.txt, visible breadcrumbs, geo + verification meta |
| Loading screen | Branded preloader that waits for the critical images and the first frame of the hero video, then fades away — every wait is capped so a slow asset can never block the page (configurable in `config/site.php`) |
| Design | Custom industrial design system (charcoal / deep green / bright green), fully responsive 320→1920 px, accessible |

---

## Requirements

- PHP **8.2+** (8.1 also works) with extensions: `pdo_mysql`, `mbstring`, `fileinfo`, `json`, `session`, `openssl`
- MySQL 5.7+ or MariaDB 10.3+
- Apache (mod_rewrite) or Nginx
- Composer only if you want the **Sophisticated SMTP** driver with PHPMailer (optional)

> The site runs with **no database** in a degraded mode (forms still work and are stored as JSON logs),
> but for production use the MySQL setup below.

---

## Installation

1. Copy the project onto your server (web root) or local environment.
2. Give the `uploads/` directory write permission (`chmod -R 775 uploads` on Linux, or set IIS/Apache write perms).
3. Create the configuration file:

```bash
cp .env.example .env
```

4. Open `.env` and set `APP_ENV`, `APP_URL`, database credentials and business numbers.
5. Point your web server document root at the project root (files must remain above the web root's document public folder or the root itself, depending on your host).

## Database Setup

```bash
# create and import the schema
mysql -u root -p < database/schema.sql
# or: mysql -u root -p -e "CREATE DATABASE scrap_site CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
# then import the file in phpMyAdmin if you prefer
```

Then create an admin account by visiting **`/admin/install`** in your browser — a guarded first-run
screen creates the admin user (password is stored with `password_hash()` / bcrypt).

**Tables created:** `users`, `contact_requests`, `pickup_requests`, `industrial_requests`,
`uploaded_files`, `settings`, `faqs`, `testimonials`, `services`, `locations`.

## Environment Variables

See `.env.example`. The most important ones:

```dotenv
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_HOST=127.0.0.1
DB_NAME=scrap_site
DB_USER=scrap_user
DB_PASSWORD=strong-password

MAIL_DRIVER=log            # log | mail | smtp
MAIL_HOST=smtp.yourhost.com
MAIL_PORT=587
MAIL_USERNAME=...
MAIL_PASSWORD=...

ADMIN_EMAIL=info@yourcompany.com
WHATSAPP_NUMBER=9665XXXXXXXX
PHONE_NUMBER=+9665X-XXX-XXXX
SESSION_NAME=scrap_sess
SESSION_SECURE=0           # set to 1 on HTTPS-only hosts
```

> Never commit a real `.env` to Git — `.gitignore` already excludes it.
## Apache Configuration

The project ships with an `.htaccess` that provides clean URLs, security headers, compression and
caching. Requirements: `mod_rewrite`, `mod_headers`, `mod_deflate`, `mod_expires`.

```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    DocumentRoot /var/www/scrap-website
    <Directory /var/www/scrap-website>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Enable HTTPS with Let's Encrypt and uncomment the forced-HTTPS block in `.htaccess`.

## Nginx Configuration

```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/scrap-website;

    index index.php;

    add_header X-Content-Type-Options nosniff;
    add_header X-Frame-Options SAMEORIGIN;
    add_header Referrer-Policy "strict-origin-when-cross-origin";

    # Block dotfiles and .env
    location ~ /\.(?!well-known) { deny all; }
    # robots.txt and sitemap.xml are rendered by the front controller
    # (the absolute Sitemap URL is injected there — never serve the raw files)
    location = /robots.txt  { rewrite ^ /index.php last; access_log off; }
    location = /sitemap.xml { rewrite ^ /index.php last; access_log off; }

    # Uploads: never execute PHP inside the uploads directory
    location ^~ /uploads/ {
        location ~* \.php$ { deny all; }
    }

    # Front controller
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
    }

    location ~* \.(css|js|svg|jpg|png|webp|ico)$ {
        expires 30d;
        add_header Cache-Control "public, immutable";
    }
}
```

## Local Development

**Windows (quickest):** double-click **`start.bat`** in the project root — it finds PHP (PATH or
`C:\xampp\php`), starts the server and opens `http://localhost:8000`.

Manual alternative (any OS):

```bash
mysql -u root -p < database/schema.sql   # optional — site also runs without a database
cp .env.example .env
php -S localhost:8000 router.php
```

Open `http://localhost:8000`, then create the admin user at `http://localhost:8000/admin/install`.

> No database? The site still runs and form submissions are logged to `uploads/records/*.json`.
> Keep `APP_URL=` empty in `.env` for local dev — redirects then work on any host/port.

## Production Deployment

1. Upload all files (except `.env` and the contents of `uploads/records|files|tmp`).
2. Run `cp .env.example .env` and configure production values (`APP_DEBUG=false`, strong DB password, SMTP, HTTPS).
3. Import `database/schema.sql`, then run the end-to-end QA checklist in the README.
4. Verify `uploads/` is writable and **PHP is denied** inside it (`.htaccess` included; Nginx block above).
5. Schedule a log clean-up cron: `find uploads/logs -type f -mtime +90 -delete`.
## Admin Login Setup

- Visit `/admin/install` on a fresh install to create the first admin account.
- Login URL: `/admin/login`.
- Passwords use `password_hash()` (bcrypt). To reset a password from the console:

```bash
php -r "echo password_hash('NewStrongPass', PASSWORD_DEFAULT);"
```

## Email Configuration

Drivers in `.env` → `config/mail.php`:

- **log** — writes every message to `uploads/logs/mail.log`. Perfect for testing; nothing is lost.
- **mail** — uses PHP `mail()`; requires a configured MTA on the server.
- **smtp** — the recommended production driver. Install PHPMailer:

```bash
composer require phpmailer/phpmailer
```

Then set `MAIL_DRIVER=smtp` and the host/port/user/pass. Uploaded photos are attached natively.

## WhatsApp Configuration

Edit `config/site.php` (or the `whatsapp` setting from `/admin/settings`):

```php
'whatsapp' => '9665XXXXXXXX',   // international format, digits only
```

This powers the floating button, mobile CTA bar, header button and every pre-filled `wa.me` link.

## Image Management

- All visuals are **original SVG placeholders** in `assets/images/`.
- Replace them with real photos while keeping the same filenames, or update the references.
- Every `<img>` has descriptive `alt` text; non-critical images load lazily.
- Customer uploads live in `uploads/files/YYYY/MM/` under random names — originals are never used on disk.

## Loading Screen (Preloader)

`includes/header.php` renders the overlay and sets `is-loading` on `<html>`, so the very first paint is
already covered; `assets/js/app.js` lifts it once the assets are ready.

- **Waits for:** every `<img>` that is not `loading="lazy"`, the first frame of the hero `<video>`
  (`loadeddata`/`canplay`) and `window.load`. A gradient progress bar tracks both.
- **Never waits for:** lazy (below-the-fold) images, Google Maps iframes, or anything a timer caps.
- **Hard caps** — all in `config/site.php` under `preloader`:
  `max_wait_ms` (default 6000) is the ceiling for the whole overlay, `video_wait_ms` (4000) limits the
  hero-video wait, `min_show_ms` (500) avoids a flicker on fast connections. A last-resort timer also
  releases the scroll lock, so a broken asset can never trap the visitor.
- `skip_after_first = true` shows the loader only on the first page view of a browser session
  (`sessionStorage`), so repeat navigation feels instant. `preloader_enabled = false` disables it
  completely. The 404 and thank-you pages never show it.
- **Accessibility & SEO:** `<noscript>` hides the overlay, the logo/spinner are decorative
  (`aria-hidden`), the wrapper is `role="status"`, and `prefers-reduced-motion` disables the
  animations. The markup is plain HTML layered over the real content, so crawlers always see the full
  page whether or not the loader is on screen.

## SEO Configuration

Everything crawlers need is generated from `config/site.php` — nothing is hardcoded per template.

**Automatically handled on every page** (`includes/header.php`)

- A unique `<title>` (the brand suffix is dropped automatically when a title would exceed
  `seo.max_title_length`, default 65 characters) and a meta description trimmed to ~158 characters
  on a word boundary.
- A self-referencing canonical **without a trailing slash** — this matches the 301 rule in
  `.htaccess`, so the canonical never points at a redirecting URL.
- `<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">`;
  the 404 and thank-you pages emit `noindex, nofollow` instead.
- Open Graph + Twitter/X cards. The share image must be a **raster** file: WhatsApp, Facebook and
  LinkedIn ignore SVG and AVIF previews, so `social_image()` falls back to `seo.default_og_image`
  for those. Each scrap landing page shares its own category photo instead.
- Local SEO meta: `theme-color`, `geo.region`, `geo.placename`, `geo.position`, `ICBM` (per-city on
  the location pages, using the `geo` values in `config/site.php`).
- Search-console verification tags, driven by `.env`:
  `GOOGLE_SITE_VERIFICATION=` and `BING_SITE_VERIFICATION=` (empty = tag omitted).
- One JSON-LD `@graph` per page: `WebSite`, `LocalBusiness` (stable `@id`, logo, image, geo, opening
  hours, `hasOfferCatalog` listing every scrap category), a **city-level** `LocalBusiness` on the
  location pages, a `Service` node on scrap/location landing pages, and a `BreadcrumbList`.
  `render_faq()` adds a separate `FAQPage` node wherever an FAQ section is rendered.
- Accessible, visible breadcrumbs (Home › Services › Copper Scrap Buyer) under the header, mirroring
  the `BreadcrumbList` schema.
- Page-level hooks: `$pageImage`, `$pageImageAlt`, `$pageType`, `$extraSchemas`,
  `$preloadImages`, `$breadcrumbs = false`, `$noindex = true`.

**Crawler files**

- `/sitemap.xml` — generated by `sitemap.php`: every indexable URL **without** trailing slashes, a
  real `lastmod` (newest file mtime), and an image entry for every scrap category.
- `/robots.txt` — the `{APP_URL}` placeholder is replaced at runtime so the `Sitemap:` line is always
  absolute. Both files are rendered by the front controller (`.htaccess` and `router.php` both route
  them there; the nginx snippet above does the same).
- Disallowed: `/admin/`, `/actions/`, `/includes/`, `/config/`, `/database/`, `/uploads/`,
  `/thank-you`, `/router.php`, `/sitemap.php`. Apache also sends `X-Robots-Tag: noindex` for
  everything under `/uploads/`.

**Do this after launch**

1. Verify the property in Google Search Console (and Bing Webmaster Tools) using the `.env` values
   above, then submit `/sitemap.xml`.
2. Re-encode `assets/images/hero/hero.mp4` (currently ~92 MB) — the hero video is the largest
   contentful paint element:

   ```bash
   ffmpeg -i hero.mp4 -vcodec libx264 -crf 28 -preset slow -vf scale=1280:-2 \
          -movflags +faststart -an hero-optimised.mp4
   ```

   Keep it under 3–5 MB and replace the original (same filename) so nothing else has to change.
3. Keep the phone/WhatsApp numbers and opening hours in `config/site.php` (or the admin panel) in sync
   with the Google Business Profile — the `LocalBusiness` schema is generated from them.

## Backup

- Database: `mysqldump -u root -p scrap_site > backup_$(date +%F).sql` (schedule nightly).
- Files: back up everything except `uploads/files`, `uploads/records`, `uploads/tmp`.
- Keep `.env` in a password manager / CI secret store.

## Security Checklist

- [x] PDO prepared statements everywhere
- [x] CSRF tokens on all forms (`hash_equals`)
- [x] Rate limiting per form + per IP (contact, pickup, industrial, admin login)
- [x] Honeypot anti-bot field
- [x] Upload validation — real MIME via `finfo`, ≤ 5 MB, random names, PHP disabled in uploads
- [x] XSS-safe output via `e()`
- [x] HttpOnly + SameSite session cookies, secure flag in production, ID regeneration on login
- [x] Admin passwords hashed with bcrypt; login throttled; admin pages `noindex`
- [x] Security headers (nosniff, frame, referrer, permissions) and production error hiding
---

## Project Structure

```text
├── index.php            front controller (routes every clean URL)
├── router.php           php -S development router
├── .htaccess            Apache clean URLs + security
├── config/              site.php · database.php · mail.php
├── includes/            header · navbar · footer · components · forms · security · storage · mailer · auth
├── actions/             contact.php · pickup-request.php · industrial-request.php
├── pages/               home, about, contact, services, pickup, how-it-works, faq, privacy, terms, thank-you, 404
├── scrap/               _data.php + 9 category pages
├── locations/           mecca · jeddah · taif
├── admin/               _layout + dashboard, requests, request-view, testimonials, faqs, services, locations, settings, login, install, logout
├── assets/              css (style, responsive, admin) · js/app.js · images (original SVG set)
├── database/            schema.sql
├── uploads/             logs · records · files · tmp (PHP execution disabled)
└── README.md
```

## Final Quality Check

- [x] All public pages wired through the router
- [x] Every nav link, CTA and button reaches a real page
- [x] Forms validated server-side with CSRF + rate limiting + photo uploads
- [x] Admin panel with login, inbox, photos, statuses and content managers
- [x] SEO metadata, JSON-LD `@graph`, sitemap.xml + image entries, robots.txt at the required URLs
- [x] Loading screen waits for critical images + hero video, then reveals the page (hard-capped)
- [x] Responsive, accessible, semantic layouts
- [ ] **You**: replace placeholder business values in `config/site.php`, add real customer reviews in
      `/admin/testimonials`, upload real photos, compress `hero.mp4`, add the Search Console
      verification values and set production `.env` values.

All business information is managed in exactly one place — `config/site.php` — with optional
admin-managed overrides under `/admin/settings`.