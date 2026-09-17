<?php
/**
 * Global footer.
 */
declare(strict_types=1);
$siteName = site('site_name');
$year = date('Y');
?>
    </main><!-- /.site-main -->

    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col footer-col--brand">
                    <a class="brand brand--footer" href="<?= e(url('/')) ?>">
                        <img class="brand__mark" src="<?= e(asset('images/logo.svg')) ?>" alt="" width="42" height="42">
                        <span class="brand__text"><?= e($siteName) ?></span>
                    </a>
                    <p class="footer__about">
                        Professional scrap metal buying, weighing and pickup service in
                        <?= e(site('service_area')) ?>. Fair prices, official weighing and instant payment.
                    </p>
                    <ul class="social-links">
                        <li><a href="https://www.linkedin.com/in/scrap-buyer-in-dammam-787970290/" target="_blank" rel="noopener" aria-label="LinkedIn">
                            <i class="fa-brands fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>

                <nav class="footer-col" aria-label="Company links">
                    <h2 class="footer__heading">Company</h2>
                    <ul class="footer__links">
                        <li><a href="<?= e(url('about-us')) ?>">About Us</a></li>
                        <li><a href="<?= e(url('services')) ?>">Services</a></li>
                        <li><a href="<?= e(url('how-it-works')) ?>">How It Works</a></li>
                        <li><a href="<?= e(url('faq')) ?>">FAQ</a></li>
                        <li><a href="<?= e(url('contact-us')) ?>">Contact Us</a></li>
                    </ul>
                </nav>

                <nav class="footer-col" aria-label="Scrap categories">
                    <h2 class="footer__heading">We Buy</h2>
                    <ul class="footer__links footer__links--two-col">
                        <?php foreach ($GLOBALS['scrapCategories'] as $cat): ?>
                        <li><a href="<?= e(url($cat['slug'])) ?>"><?= e($cat['name']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <nav class="footer-col" aria-label="Location">
                    <h2 class="footer__heading">Location</h2>
                    <ul class="footer__links">
                        <li><a href="<?= e(url('contact-us')) ?>">Dammam, Eastern, Saudi Arabia</a></li>
                    </ul>
                </nav>

                <div class="footer-col footer-col--contact">
                    <h2 class="footer__heading">Contact</h2>
                    <ul class="footer__contact">
                        <li><i class="fa-solid fa-phone" aria-hidden="true"></i>
                            <a href="<?= e(phone_href()) ?>"><?= e(site('phone')) ?></a></li>
                        <li><i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                            <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener">WhatsApp Us</a></li>
                        <li><i class="fa-solid fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:<?= e(site('email')) ?>"><?= e(site('email')) ?></a></li>
                        <li><i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                            <?= e(site('address')) ?></li>
                        <li><i class="fa-regular fa-clock" aria-hidden="true"></i>
                            <?= e(site('hours_short')) ?></li>
                    </ul>
                </div>
            </div>
                <div class="footer-legal__links">
                    <a href="<?= e(url('privacy-policy')) ?>">Privacy Policy</a>
                    <a href="<?= e(url('terms')) ?>">Terms &amp; Conditions</a>
                    <a href="<?= e(url('services')) ?>">Services</a>
                </div>
                <p class="footer-copy">© <?= e($year) ?> <?= e(site('company')) ?>. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <?php require __DIR__ . '/whatsapp-button.php'; ?>

    <script src="<?= e(asset('js/app.js')) ?>" defer></script>
</body>
</html>