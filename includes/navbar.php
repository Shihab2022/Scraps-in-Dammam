<?php
/**
 * Global site navigation — sticky header, dropdowns, call/WhatsApp CTAs,
 * accessible mobile drawer, language switcher and sticky mobile CTA bar.
 */
declare(strict_types=1);
$siteName = ts('site_name');
$activeRoute = current_path();
$waMsg = tr('Hello, I would like to sell my scrap. Can you provide a quote?');
?>
<a class="skip-link" href="#main"><?= e(tr('Skip to main content')) ?></a>

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
                    <?= e(ts('hours_short')) ?></li>
            </ul>
            <span class="topbar__area"><i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                <?= e(ts('service_area')) ?></span>
        </div>
    </div>

    <!-- Main navigation -->
    <nav class="navbar" aria-label="<?= e(tr('Main navigation')) ?>">
        <div class="container navbar__inner">
            <a class="brand" href="<?= e(url('/')) ?>" aria-label="<?= e($siteName) ?> — <?= e(tr('Home')) ?>">
                <img class="brand__mark" src="<?= e(asset('images/logo.svg')) ?>" alt="" width="42" height="42">
                <span class="brand__text"><?= e($siteName) ?></span>
            </a>

            <div class="navbar__actions">
                <?php // Language switcher stays in the navbar on phones/tablets;
                      // the copy inside the drawer below serves the desktop layout. ?>
                <span class="navbar__lang"><?php lang_switcher(); ?></span>

                <button class="nav-toggle" id="navToggle" type="button"
                        aria-expanded="false" aria-controls="navMenu" aria-label="<?= e(tr('Open menu')) ?>"
                        data-label-open="<?= e(tr('Open menu')) ?>" data-label-close="<?= e(tr('Close menu')) ?>">
                    <span class="nav-toggle__bar" aria-hidden="true"></span>
                    <span class="nav-toggle__bar" aria-hidden="true"></span>
                    <span class="nav-toggle__bar" aria-hidden="true"></span>
                </button>
            </div>

            <ul class="nav-menu" id="navMenu" role="menubar">
                <?php // Popup header (≤1200px): its own close button + brand, so the
                      // navbar row behind the drawer never shows through it. ?>
                <li class="nav-drawer-head">
                    <a class="brand brand--drawer" href="<?= e(url('/')) ?>"
                       aria-label="<?= e($siteName) ?> — <?= e(tr('Home')) ?>">
                        <img class="brand__mark" src="<?= e(asset('images/logo.svg')) ?>" alt="" width="42" height="42">
                        <span class="brand__text"><?= e($siteName) ?></span>
                    </a>
                    <button class="nav-close" id="navClose" type="button"
                            aria-controls="navMenu" aria-label="<?= e(tr('Close menu')) ?>">
                        <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                    </button>
                </li>

                <li<?= $activeRoute === '' ? ' class="active"' : '' ?>>
                    <a href="<?= e(url('/')) ?>"><?= e(tr('Home')) ?></a></li>
                <li<?= $activeRoute === '/about-us' ? ' class="active"' : '' ?>>
                    <a href="<?= e(url('about-us')) ?>"><?= e(tr('About Us')) ?></a></li>
                <li class="has-dropdown">
                    <button class="nav-dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
                        <?= e(tr('Locations')) ?> <i class="fa-solid fa-chevron-down nav-caret" aria-hidden="true"></i></button>
                    <ul class="nav-dropdown nav-dropdown--locations">
                        <?php foreach (site('locations', []) as $locKey => $loc): ?>
                        <li><a href="<?= e(url($loc['slug'])) ?>"><i class="fa-solid fa-location-dot" aria-hidden="true"></i> <span><?= e(tr('Scrap Buyer in :city', [':city' => tr($loc['name'])])) ?></span></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="has-dropdown">
                    <button class="nav-dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
                        <?= e(tr('We Buy')) ?> <i class="fa-solid fa-chevron-down nav-caret" aria-hidden="true"></i></button>
                    <ul class="nav-dropdown">
                        <?php foreach ($GLOBALS['scrapCategories'] as $navCat): ?>
                        <li><a href="<?= e(url($navCat['slug'])) ?>"><i class="fa-solid <?= e($navCat['icon']) ?>" aria-hidden="true"></i> <span><?= e($navCat['name']) ?></span></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li<?= $activeRoute === '/contact-us' ? ' class="active"' : '' ?>>
                    <a href="<?= e(url('contact-us')) ?>"><?= e(tr('Contact Us')) ?></a></li>

                <?php // Language switcher (desktop menu). On phones/tablets the same
                      // button is rendered in the navbar through .navbar__lang. ?>
                <li class="lang-switch-item"><?php lang_switcher(); ?></li>

                <li class="nav-cta-wrap">
                    <a class="btn btn--wa" href="<?= e(whatsapp_link($waMsg)) ?>" target="_blank" rel="noopener">
                        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp')) ?></a>
                    <a class="btn btn--ghost" href="<?= e(phone_href()) ?>">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call')) ?></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Overlay for the mobile drawer (visibility + pointer-events follow .show) -->
<div class="nav-overlay" id="navOverlay" aria-hidden="true" hidden></div>

<!-- Sticky mobile bottom CTA bar -->
<div class="mobile-cta" role="group" aria-label="<?= e(tr('Quick contact')) ?>">
    <a class="mobile-cta__btn mobile-cta__call" href="<?= e(phone_href()) ?>">
        <i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
    <a class="mobile-cta__btn mobile-cta__wa" href="<?= e(whatsapp_link($waMsg)) ?>" target="_blank" rel="noopener">
        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp')) ?></a>
</div>