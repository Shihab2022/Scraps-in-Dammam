<?php
/**
 * Global footer.
 */
declare(strict_types=1);
$siteName = ts('site_name');
$year = date('Y');
?>
    </main><!-- /.site-main -->

    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col footer-col--brand">
                    <a class="brand brand--footer" href="<?= e(url('/')) ?>">
                        <img class="brand__mark" src="<?= e(asset('images/logo.svg')) ?>" alt="" width="38" height="38">
                        <span class="brand__text"><?= e($siteName) ?></span>
                    </a>
                    <p class="footer__about"><?= e(tr('Professional scrap metal buying, weighing and pickup service in :area. Fair prices, official weighing and instant payment.', [':area' => ts('service_area')])) ?></p>
                    <ul class="social-links">
                        <li><a href="https://www.linkedin.com/in/scrap-buyer-in-dammam-787970290/" target="_blank" rel="noopener" aria-label="LinkedIn">
                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
                            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a></li>
                    </ul>
                </div>

                <nav class="footer-col" aria-label="<?= e(tr('Company links')) ?>">
                    <h2 class="footer__heading"><?= e(tr('Company')) ?></h2>
                    <ul class="footer__links">
                        <li><a href="<?= e(url('about-us')) ?>"><?= e(tr('About Us')) ?></a></li>
                        <li><a href="<?= e(url('services')) ?>"><?= e(tr('Services')) ?></a></li>
                        <li><a href="<?= e(url('how-it-works')) ?>"><?= e(tr('How It Works')) ?></a></li>
                        <li><a href="<?= e(url('faq')) ?>"><?= e(tr('FAQ')) ?></a></li>
                        <li><a href="<?= e(url('contact-us')) ?>"><?= e(tr('Contact Us')) ?></a></li>
                    </ul>
                </nav>

                <nav class="footer-col" aria-label="<?= e(tr('Locations')) ?>">
                    <h2 class="footer__heading"><?= e(tr('Locations')) ?></h2>
                    <ul class="footer__links">
                        <?php foreach (site('locations', []) as $loc): ?>
                        <li><i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                            <a href="<?= e(url($loc['slug'])) ?>"><?= e(tr($loc['name'])) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <div class="footer-col footer-col--contact">
                    <h2 class="footer__heading"><?= e(tr('Contact')) ?></h2>
                    <ul class="footer__contact">
                        <li><i class="fa-solid fa-phone" aria-hidden="true"></i>
                            <a href="<?= e(phone_href()) ?>"><?= e(site('phone')) ?></a></li>
                        <li><i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                            <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><?= e(tr('WhatsApp Us')) ?></a></li>
                        <li><i class="fa-solid fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:<?= e(site('email')) ?>"><?= e(site('email')) ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-legal">
                <p class="footer-copy">© <?= e($year) ?> <?= e($siteName) ?>. <?= e(tr('All Rights Reserved.')) ?></p>
                <div class="footer-legal__links">
                    <a href="<?= e(url('privacy-policy')) ?>"><?= e(tr('Privacy Policy')) ?></a>
                    <span class="footer-legal__sep" aria-hidden="true">·</span>
                    <a href="<?= e(url('terms')) ?>"><?= e(tr('Terms & Conditions')) ?></a>
                    <span class="footer-legal__sep" aria-hidden="true">·</span>
                    <a href="<?= e(url('services')) ?>"><?= e(tr('Services')) ?></a>
                </div>
            </div>
        </div>
    </footer>

    <?php require __DIR__ . '/whatsapp-button.php'; ?>

    <script src="<?= e(asset('js/app.js')) ?>" defer></script>
</body>
</html>