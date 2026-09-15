<?php
/**
 * Global HTML header + metadata.
 * Expects (set before include): $pageTitle, $pageDescription.
 * Optional: $pageCanonical, $pageImage, $businessSchema (bool), $noindex.
 */
declare(strict_types=1);

$siteName = site('site_name');
$company  = site('company');

$pageTitle       ??= $siteName;
$pageDescription ??= 'Professional scrap metal buying and pickup service across Dammam and the Eastern Province, Saudi Arabia.';
$pageImage       ??= asset('images/og-default.svg');
$current          = current_path();
$pageCanonical   ??= url($current === '' ? '/' : $current . '/');
$businessSchema   = $businessSchema ?? false;
$noindex          = $noindex ?? false;

$fullTitle = ($pageTitle === $siteName) ? $siteName : $pageTitle . ' | ' . $siteName;
$desc = mb_substr(trim($pageDescription), 0, 158);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($fullTitle) ?></title>
    <meta name="description" content="<?= e($desc) ?>">
    <?php if ($noindex): ?><meta name="robots" content="noindex, nofollow"><?php endif; ?>
    <link rel="canonical" href="<?= e($pageCanonical) ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e($siteName) ?>">
    <meta property="og:title" content="<?= e($fullTitle) ?>">
    <meta property="og:description" content="<?= e($desc) ?>">
    <meta property="og:url" content="<?= e($pageCanonical) ?>">
    <meta property="og:image" content="<?= e($pageImage) ?>">
    <meta property="og:locale" content="en_US">

    <!-- Twitter / X card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($fullTitle) ?>">
    <meta name="twitter:description" content="<?= e($desc) ?>">
    <meta name="twitter:image" content="<?= e($pageImage) ?>">

    <link rel="icon" type="image/svg+xml" href="<?= e(asset('images/logo.svg')) ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
    <?php if ($businessSchema): echo jsonld([
            '@context' => 'https://schema.org',
            '@type'    => 'LocalBusiness',
            '@id'      => app_url() . '/#business',
            'name'     => $siteName,
            'legalName'=> $company,
            'url'      => url('/'),
            'image'    => asset('images/og-default.svg'),
            'telephone'=> site('phone'),
            'email'    => site('email'),
            'priceRange' => '$$',
            'address'  => ['@type'=>'PostalAddress','streetAddress'=>site('address','Dammam, Saudi Arabia'),'addressLocality'=>site('city'),'addressCountry'=>'SA'],
            'geo'      => ['@type'=>'GeoCoordinates','latitude'=>26.4207,'longitude'=>50.0888],
            'areaServed' => array_map(function($a){return ['@type'=>'City','name'=>$a];}, site('service_areas',[])),
            'openingHoursSpecification' => [
                ['@type'=>'OpeningHoursSpecification','dayOfWeek'=>['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday'],'opens'=>'08:00','closes'=>'20:00'],
                ['@type'=>'OpeningHoursSpecification','dayOfWeek'=>'Friday','opens'=>'14:00','closes'=>'20:00'],
            ],
            'sameAs' => array_values(array_filter(site('social',[]))),
        ]); endif; ?>
</head>
<body>
<?php require __DIR__ . '/navbar.php'; ?>
<?php $flash = flash_get(); if ($flash): ?>
<div class="flash flash--<?= e($flash['type']) ?>" role="alert">
    <div class="container flash__inner"><?= e($flash['message']) ?></div>
</div>
<?php endif; ?>
<main id="main" class="o-main">