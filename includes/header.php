<?php
/**
 * Global HTML header + metadata (SEO).
 *
 * Expects (set before include): $pageTitle, $pageDescription.
 * Optional: $pageCanonical, $pageImage, $pageImageAlt, $pageType, $businessSchema (bool),
 *           $noindex (bool), $breadcrumbs (bool), $extraSchemas (array), $preloadImages (array).
 */
declare(strict_types=1);

$siteName = site('site_name');
$company  = site('company');

$pageTitle       ??= $siteName;
$pageDescription ??= 'We Buy All Types of Scrap Metal in Mecca, Jeddah & Taif, Saudi Arabia — Copper, Old Cable, Used Battery, Aluminum, Iron Steel, Wood, S.S. Steel & All Mix Scrap. Free pickup, certified weighing and instant payment.';
$pageImage       ??= null;
$pageImageAlt    ??= $siteName . ' — scrap buying, certified weighing and free pickup in ' . site('service_area');
$pageType        ??= 'website';
$current          = current_path();
$route            = trim($current, '/');

/* -------------------- Location context (geo meta + city entity) -------------------- */
$currentLocation = null;
foreach ((array) site('locations', []) as $loc) {
    if (($loc['slug'] ?? '') === $route) { $currentLocation = $loc; break; }
}
$geo = $currentLocation['geo'] ?? site('geo', ['lat' => 21.4225, 'lng' => 39.8262]);

/* -------------------- Social share image -------------------- */
// A scrap landing page shares its own category photo; everything else uses the
// default. social_image() swaps SVG/AVIF for a raster fallback automatically.
$shareImage = null;
if (function_exists('current_scrap_key') && function_exists('scrap_category')) {
    $shareKey = current_scrap_key();
    if ($shareKey !== null) {
        $shareCat = scrap_category($shareKey);
        if ($shareCat) $shareImage = $shareCat['image'] ?? null;
    }
}
$pageImage = !empty($pageImage) ? $pageImage : social_image($shareImage);
// No trailing slash here: it must match the 301 redirect rule in .htaccess.
$pageCanonical   ??= url($current === '' ? '/' : $current);
$businessSchema   = $businessSchema ?? true;
$noindex          = $noindex ?? false;
$breadcrumbs      = $breadcrumbs ?? true;
$extraSchemas     = $extraSchemas ?? [];
$preloadImages    = $preloadImages ?? [];   // paths relative to assets/, e.g. 'images/hero/hero.svg'

// Utility pages (404, thank-you) stay out of the entity graph entirely.
if ($noindex) $businessSchema = false;

/* -------------------- Title & description -------------------- */
$suffix  = ' | ' . $siteName;
$measure = static function (string $value): int {
    return function_exists('mb_strlen') ? (int) mb_strlen($value) : strlen($value);
};
$fullTitle = ($pageTitle === $siteName) ? $siteName : $pageTitle . $suffix;
// Drop the brand suffix rather than let the search result truncate the title.
if ($pageTitle !== $siteName && $measure($pageTitle . $suffix) > (int) site('seo.max_title_length', 65)) {
    $fullTitle = $pageTitle;
}
$desc = trim((string) $pageDescription);
if ($measure($desc) > 158) {
    // Trim to ~158 characters but never end mid-word, and signal the cut.
    $desc = function_exists('mb_substr') ? mb_substr($desc, 0, 158) : substr($desc, 0, 158);
    $space = strrpos($desc, ' ');
    if ($space !== false && $space > 100) $desc = substr($desc, 0, $space);
    $desc = rtrim($desc, " \t\n\r\0\x0B,;:-–—");
    $desc .= '…';
}

/* -------------------- Social image details -------------------- */
$defaultOg   = social_image();
$ogIsDefault = ($pageImage === $defaultOg);
$ogExt       = strtolower((string) pathinfo((string) (parse_url($pageImage, PHP_URL_PATH) ?? ''), PATHINFO_EXTENSION));
$ogMime      = [
    'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'webp' => 'image/webp',
    'gif' => 'image/gif', 'svg' => 'image/svg+xml', 'avif' => 'image/avif',
][$ogExt] ?? '';

/* -------------------- Loading screen -------------------- */
$preloaderCfg = (array) site('preloader', []);
$preloaderOn  = (bool) site('preloader_enabled', true) && !$noindex;

/* ==================== Structured data (JSON-LD @graph) ==================== */
$graph = [];
$orgId  = app_url() . '/#business';
$cities = [];
foreach (array_values(array_filter((array) site('service_areas', []))) as $area) {
    $cities[] = ['@type' => 'City', 'name' => $area];
}
$hours = [
    ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'], 'opens' => '08:00', 'closes' => '20:00'],
    ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => 'Friday', 'opens' => '14:00', 'closes' => '20:00'],
];
$social = array_values(array_filter(array_map('strval', (array) site('social', []))));

if (!$noindex) {
    /* 1. Web site entity. */
    $graph[] = [
        '@type'       => 'WebSite',
        '@id'         => app_url() . '/#website',
        'url'         => url('/'),
        'name'        => $siteName,
        'description' => site('tagline'),
        'inLanguage'  => site('language', 'en'),
        'publisher'   => $businessSchema ? ['@id' => $orgId] : ['@type' => 'Organization', 'name' => $siteName, 'url' => url('/')],
    ];

    /* 2. Business entity — one stable @id across the site. */
    if ($businessSchema) {
        $business = [
            '@type'              => 'LocalBusiness',
            '@id'                => $orgId,
            'name'               => $siteName,
            'legalName'          => $company,
            'description'        => site('tagline'),
            'slogan'             => site('tagline'),
            'url'                => url('/'),
            'logo'               => asset('images/logo.svg'),
            'image'              => social_image(),
            'telephone'          => site('phone'),
            'email'              => site('email'),
            'priceRange'         => '$$',
            'currenciesAccepted' => site('currency', 'SAR'),
            'paymentAccepted'    => 'Cash, Bank Transfer',
            'address'            => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => site('address', 'Mecca, Saudi Arabia'),
                'addressLocality' => site('city'),
                'addressCountry'  => 'SA',
            ],
            'geo'                => ['@type' => 'GeoCoordinates', 'latitude' => (float) ($geo['lat'] ?? 21.4225), 'longitude' => (float) ($geo['lng'] ?? 39.8262)],
            'areaServed'         => $cities,
            'openingHoursSpecification' => $hours,
            'contactPoint'       => [[
                '@type'             => 'ContactPoint',
                'telephone'         => site('phone'),
                'contactType'       => 'customer service',
                'areaServed'        => 'SA',
                'availableLanguage' => ['en', 'ar'],
            ]],
            'hasOfferCatalog'    => [
                '@type'           => 'OfferCatalog',
                'name'            => 'Scrap buying services',
                'itemListElement' => array_map(static function (array $cat): array {
                    return ['@type' => 'Offer', 'itemOffered' => [
                        '@type' => 'Service',
                        'name'  => $cat['title'] . ' Scrap Buying',
                        'url'   => url($cat['slug']),
                    ]];
                }, array_values((array) ($GLOBALS['scrapCategories'] ?? []))),
            ],
        ];
        if ($social) $business['sameAs'] = $social;
        $graph[] = $business;
    }

    /* 3. City-specific entity on the location landing pages. */
    $providerId = $orgId;
    if ($currentLocation) {
        $providerId = url($currentLocation['slug']) . '#business';
        $cityBiz = [
            '@type'              => 'LocalBusiness',
            '@id'                => $providerId,
            'name'               => $siteName . ' — ' . $currentLocation['name'],
            'parentOrganization' => ['@id' => $orgId],
            'url'                => url($currentLocation['slug']),
            'image'              => social_image(),
            'telephone'          => site('phone'),
            'email'              => site('email'),
            'priceRange'         => '$$',
            'currenciesAccepted' => site('currency', 'SAR'),
            'address'            => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => site('address', 'Mecca, Saudi Arabia'),
                'addressLocality' => $currentLocation['name'],
                'addressCountry'  => 'SA',
            ],
            'areaServed'         => ['@type' => 'City', 'name' => $currentLocation['name']],
            'openingHoursSpecification' => $hours,
        ];
        if (isset($currentLocation['geo'])) {
            $cityBiz['geo'] = ['@type' => 'GeoCoordinates', 'latitude' => (float) $currentLocation['geo']['lat'], 'longitude' => (float) $currentLocation['geo']['lng']];
        }
        if ($social) $cityBiz['sameAs'] = $social;
        $graph[] = $cityBiz;
    }
}

$scrapKey = function_exists('current_scrap_key') ? current_scrap_key() : null;
if (!$noindex) {
    /* 4. Service entity for the scrap category / city landing pages. */
    if ($scrapKey !== null && function_exists('scrap_category')) {
        $cat = scrap_category($scrapKey);
        if ($cat) {
            $graph[] = [
                '@type'       => 'Service',
                '@id'         => url($cat['slug']) . '#service',
                'name'        => $cat['title'] . ' Scrap Buying Service',
                'serviceType' => $cat['title'] . ' scrap purchase & collection',
                'description' => $cat['short'],
                'url'         => url($cat['slug']),
                'image'       => social_image($cat['image'] ?? null),
                'provider'    => ['@id' => $orgId],
                'areaServed'  => $cities,
            ];
        }
    } elseif ($currentLocation) {
        $graph[] = [
            '@type'       => 'Service',
            '@id'         => url($currentLocation['slug']) . '#service',
            'name'        => 'Scrap Buying & Free Pickup in ' . $currentLocation['name'],
            'serviceType' => 'Scrap metal purchase, weighing and collection',
            'description' => 'Free scrap pickup, certified weighing and instant payment for homes, shops, workshops and factories in ' . $currentLocation['name'] . ', Saudi Arabia.',
            'url'         => url($currentLocation['slug']),
            'provider'    => ['@id' => $providerId],
            'areaServed'  => ['@type' => 'City', 'name' => $currentLocation['name']],
        ];
    }
}

/* 5. Breadcrumb list — mirrors the visible trail rendered under the header. */
$breadcrumbTrail = ($breadcrumbs && !$noindex && $route !== '' && function_exists('breadcrumb_trail'))
    ? breadcrumb_trail($pageTitle)
    : [];
if (count($breadcrumbTrail) > 1 && function_exists('breadcrumb_schema')) {
    $graph[] = breadcrumb_schema($breadcrumbTrail);
}

/* 6. Anything a page wants to add on top (page-specific schema). */
foreach ($extraSchemas as $extra) {
    if (is_array($extra) && $extra) $graph[] = $extra;
}

?>
<!DOCTYPE html>
<html lang="<?= e(site('language', 'en')) ?>" dir="ltr"<?= $preloaderOn ? ' class="is-loading"' : '' ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($fullTitle) ?></title>
    <meta name="description" content="<?= e($desc) ?>">
    <meta name="robots" content="<?= $noindex ? 'noindex, nofollow' : 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' ?>">
    <link rel="canonical" href="<?= e($pageCanonical) ?>">

    <?php // Local SEO signals (city, yard coordinates). ?>
    <meta name="theme-color" content="<?= e(site('seo.theme_color', '#16181d')) ?>">
    <meta name="geo.region" content="SA">
    <meta name="geo.placename" content="<?= e($currentLocation['name'] ?? site('city')) ?>">
    <meta name="geo.position" content="<?= e(($geo['lat'] ?? '') . ';' . ($geo['lng'] ?? '')) ?>">
    <meta name="ICBM" content="<?= e(($geo['lat'] ?? '') . ', ' . ($geo['lng'] ?? '')) ?>">

    <?php // Search Console / Bing verification — set the values in .env. ?>
    <?php $googleVerify = trim((string) env('GOOGLE_SITE_VERIFICATION', '')); ?>
    <?php if ($googleVerify !== ''): ?>
    <meta name="google-site-verification" content="<?= e($googleVerify) ?>">
    <?php endif; ?>
    <?php $bingVerify = trim((string) env('BING_SITE_VERIFICATION', '')); ?>
    <?php if ($bingVerify !== ''): ?>
    <meta name="msvalidate.01" content="<?= e($bingVerify) ?>">
    <?php endif; ?>

    <!-- Open Graph -->
    <meta property="og:type" content="<?= e($pageType) ?>">
    <meta property="og:site_name" content="<?= e($siteName) ?>">
    <meta property="og:title" content="<?= e($fullTitle) ?>">
    <meta property="og:description" content="<?= e($desc) ?>">
    <meta property="og:url" content="<?= e($pageCanonical) ?>">
    <meta property="og:image" content="<?= e($pageImage) ?>">
    <meta property="og:image:secure_url" content="<?= e($pageImage) ?>">
    <?php if ($ogMime !== ''): ?>
    <meta property="og:image:type" content="<?= e($ogMime) ?>">
    <?php endif; ?>
    <?php if ($ogIsDefault): ?>
    <meta property="og:image:width" content="<?= (int) site('seo.og_image_width', 1200) ?>">
    <meta property="og:image:height" content="<?= (int) site('seo.og_image_height', 630) ?>">
    <?php endif; ?>
    <meta property="og:image:alt" content="<?= e($pageImageAlt) ?>">
    <meta property="og:locale" content="en_US">

    <!-- Twitter / X card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($fullTitle) ?>">
    <meta name="twitter:description" content="<?= e($desc) ?>">
    <meta name="twitter:image" content="<?= e($pageImage) ?>">
    <meta name="twitter:image:alt" content="<?= e($pageImageAlt) ?>">
    <?php $twitterSite = trim((string) site('seo.twitter_site', '')); ?>
    <?php if ($twitterSite !== ''): ?>
    <meta name="twitter:site" content="<?= e($twitterSite) ?>">
    <meta name="twitter:creator" content="<?= e($twitterSite) ?>">
    <?php endif; ?>

    <link rel="icon" type="image/svg+xml" href="<?= e(asset('images/logo.svg')) ?>">

    <?php // Above-the-fold artwork loads first — it is the largest contentful paint element. ?>
    <?php foreach ((array) $preloadImages as $preload): ?>
    <link rel="preload" as="image" href="<?= e(asset($preload)) ?>" fetchpriority="high">
    <?php endforeach; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/responsive.css')) ?>">
    <?php // Structured data: one @graph per page (WebSite, LocalBusiness, Service, Breadcrumbs). ?>
    <?php if ($graph): echo jsonld(['@context' => 'https://schema.org', '@graph' => $graph]); endif; ?>

    <?php if ($preloaderOn && !empty($preloaderCfg['skip_after_first'])): ?>
    <script>/* Loading screen: skip it after the first view in this browser session. */
    (function () { try { if (sessionStorage.getItem('scrap_preloader_done') === '1') { document.documentElement.classList.remove('is-loading'); } } catch (e) {} })();</script>
    <?php endif; ?>
    <?php if ($preloaderOn): ?>
    <noscript><style>html.is-loading,html.is-loading body{overflow:auto}html.is-loading .site-loader{display:none}</style></noscript>
    <?php endif; ?>
</head>
<body>
<?php if ($preloaderOn): ?>
<div class="site-loader" id="siteLoader" role="status" aria-live="polite"
     data-max-wait="<?= (int) ($preloaderCfg['max_wait_ms'] ?? 6000) ?>"
     data-video-wait="<?= (int) ($preloaderCfg['video_wait_ms'] ?? 4000) ?>"
     data-min-show="<?= (int) ($preloaderCfg['min_show_ms'] ?? 500) ?>">
    <div class="site-loader__inner">
        <img class="site-loader__logo" src="<?= e(asset('images/logo.svg')) ?>" alt="" width="64" height="64">
        <span class="site-loader__ring" aria-hidden="true"></span>
        <p class="site-loader__text">Loading <?= e($siteName) ?>…</p>
        <span class="site-loader__bar" aria-hidden="true"><span class="site-loader__bar-fill" id="siteLoaderBar"></span></span>
    </div>
</div>
<?php endif; ?>
<?php require __DIR__ . '/navbar.php'; ?>
<?php $flash = flash_get(); if ($flash): ?>
<div class="flash flash--<?= e($flash['type']) ?>" role="alert">
    <div class="container flash__inner"><?= e($flash['message']) ?></div>
</div>
<?php endif; ?>
<main id="main" class="o-main">
<?php if (count($breadcrumbTrail) > 1 && function_exists('render_breadcrumbs')) render_breadcrumbs($breadcrumbTrail); ?>