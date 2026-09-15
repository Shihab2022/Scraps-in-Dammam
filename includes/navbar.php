<?php
/**
 * Global site navigation — sticky header, dropdowns, call/WhatsApp CTAs,
 * accessible mobile drawer and sticky mobile CTA bar.
 */
declare(strict_types=1);
$siteName = site('site_name');
$activeRoute = current_path();
$waMsg = 'Hello, I would like to sell my scrap. Can you provide a quote?';
?>
<a class="skip-link" href="#main">Skip to main content</a>

<header class="site-header" id="siteHeader">
    <!-- Utility bar -->
    <div class="topbar">
        <div class="container topbar__inner">
            <ul class="topbar__info">
                <li><i class="fa-solid fa-phone" aria-hidden="true"></i>
                    <a href="<?= e(phone_href()) ?>"><?= e(site('phone')) ?></a></li>
                <li><i class="fa-solid fa-envelope" aria-hidden="true"></i>
                    <a href="mailto:<?= e(site('email')) ?>"><?= e(site('email')) ?></a></li>
                <li class="topbar__hours"><i class="fa-regular fa-clock" aria-hidden="true"></i>
                    <?= e(site('hours_short')) ?></li>
            </ul>
            <span class="topbar__area"><i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                <?= e(site('service_area')) ?></span>
        </div>
    </div>

    <!-- Main navigation -->
    <nav class="navbar" aria-label="Main navigation">
        <div class="container navbar__inner">
            <a class="brand" href="<?= e(url('/')) ?>" aria-label="<?= e($siteName) ?> — Home">
                <img class="brand__mark" src="<?= e(asset('images/logo.svg')) ?>" alt="" width="42" height="42">
                <span class="brand__text"><?= e($siteName) ?></span>
            </a>

            <button class="nav-toggle" id="navToggle" type="button"
                    aria-expanded="false" aria-controls="navMenu" aria-label="Open menu">
                <span class="nav-toggle__bar" aria-hidden="true"></span>
                <span class="nav-toggle__bar" aria-hidden="true"></span>
                <span class="nav-toggle__bar" aria-hidden="true"></span>
            </button>

            <ul class="nav-menu" id="navMenu" role="menubar">
                <li<?= $activeRoute === '' ? ' class="active"' : '' ?>>
                    <a href="<?= e(url('/')) ?>">Home</a></li>
                <li<?= $activeRoute === '/about-us' ? ' class="active"' : '' ?>>
                    <a href="<?= e(url('about-us')) ?>">About Us</a></li>

                <li class="has-dropdown">
                    <button class="nav-dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
                        We Buy <i class="fa-solid fa-chevron-down nav-caret" aria-hidden="true"></i></button>
                    <ul class="nav-dropdown">
                        <?php foreach ($GLOBALS['scrapCategories'] as $cat): ?>
                        <li><a href="<?= e(url($cat['slug'])) ?>"><i class="fa-solid <?= e($cat['icon']) ?>" aria-hidden="true"></i> <?= e($cat['name']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li class="has-dropdown">
                    <button class="nav-dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
                        Locations <i class="fa-solid fa-chevron-down nav-caret" aria-hidden="true"></i></button>
                    <ul class="nav-dropdown">
                        <li><a href="<?= e(url('scrap-buyer-jubail')) ?>"><i class="fa-solid fa-city" aria-hidden="true"></i> Jubail</a></li>
                        <li><a href="<?= e(url('scrap-buyer-khobar')) ?>"><i class="fa-solid fa-city" aria-hidden="true"></i> Khobar</a></li>
                        <li><a href="<?= e(url('scrap-buyer-in-al-ahsa')) ?>"><i class="fa-solid fa-city" aria-hidden="true"></i> Al-Ahsa / Hofuf</a></li>
                        <li><a href="<?= e(url('contact-us')) ?>"><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Dammam</a></li>
                    </ul>
                </li>

                <li<?= $activeRoute === '/contact-us' ? ' class="active"' : '' ?>>
                    <a href="<?= e(url('contact-us')) ?>">Contact Us</a></li>

                <li class="nav-cta-wrap">
                    <a class="btn btn--wa" href="<?= e(whatsapp_link($waMsg)) ?>" target="_blank" rel="noopener">
                        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp</a>
                    <a class="btn btn--ghost" href="<?= e(phone_href()) ?>">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i> Call</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Overlay for the mobile drawer -->
<div class="nav-overlay" id="navOverlay" hidden></div>

<!-- Sticky mobile bottom CTA bar -->
<div class="mobile-cta" role="group" aria-label="Quick contact">
    <a class="mobile-cta__btn mobile-cta__call" href="<?= e(phone_href()) ?>">
        <i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
    <a class="mobile-cta__btn mobile-cta__wa" href="<?= e(whatsapp_link($waMsg)) ?>" target="_blank" rel="noopener">
        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp</a>
</div>