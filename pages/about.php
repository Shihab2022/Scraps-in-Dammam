<?php
/* ============================================================
 * About Us
 * ============================================================ */
$pageTitle       = tr('About Us');
$pageDescription = tr('Learn about our scrap buying company — our story, the scrap we buy, how we work, who we serve, and why customers choose us in Mecca, Jeddah & Taif, Saudi Arabia.');

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('About Us')) ?></h1>
        <p><?= e(tr('We are a professional scrap buying company based in Mecca and serving Mecca, Jeddah and Taif, helping homeowners, businesses and factories turn scrap metal into instant cash — with transparent pricing, certified weighing and fast pickup.')) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Us')) ?></a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <p class="section-eyebrow"><?= e(tr('Our Story')) ?></p>
            <h2><?= e(tr('Built on Trust, Fast Payment & Recycling')) ?></h2>
            <p><?= e(tr('We are a professional scrap buying company based in Mecca and serving Mecca, Jeddah and Taif, helping homeowners, businesses and factories turn scrap metal into instant cash — with transparent pricing, certified weighing and fast pickup.')) ?></p>
            <p><?= e(tr('What started as a small family trading business in Mecca more than :years years ago is today a full-service scrap buying operation in Mecca, Jeddah and Taif, Saudi Arabia. We grew by doing one thing consistently: paying fairly, weighing transparently and picking up fast.', [':years' => ts('stats.years_experience')])) ?></p>
            <p><?= e(tr('Today we serve residential customers, shops, maintenance workshops, contractors, warehouses and factories in Mecca, Jeddah and Taif. Every kilogram we buy is graded honestly, weighed on certified scales and processed responsibly with licensed recycling partners.')) ?></p>
            <p><?= e(tr('We believe that selling scrap should be simple, transparent and profitable for the seller. That is why we confirm the price before we arrive, pay immediately after weighing, and never ask you to transport heavy material yourself.')) ?></p>
        </div>
        <img class="reveal" src="<?= e(asset('images/about-us.png')) ?>" alt="<?= e(tr('Our team weighing and sorting scrap at our yard in Saudi Arabia')) ?>" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('What We Buy')) ?></p>
            <h2><?= e(tr('Every Type of Scrap, One Phone Call')) ?></h2>
        </header>
        <div class="scrap-grid">
            <?php foreach ($scrapCategories as $cat) render_scrap_card($cat); ?>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('How We Work')) ?></p>
            <h2><?= e(tr('From First Call to Instant Payment')) ?></h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">01</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-phone-volume"></i></span>
                <h3><?= e(tr('Call or WhatsApp')) ?></h3>
                <p><?= e(tr('Tell us what scrap you have and where you are located.')) ?></p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">02</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                <h3><?= e(tr('Receive a Price Quote')) ?></h3>
                <p><?= e(tr('We confirm the rate per kilogram before any pickup is arranged.')) ?></p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">03</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                <h3><?= e(tr('Pickup & Payment')) ?></h3>
                <p><?= e(tr('We weigh on site with certified scales and pay immediately.')) ?></p>
            </article>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <div class="split mb-3">
            <div class="split__body">
                <p class="section-eyebrow"><?= e(tr('Who We Serve')) ?></p>
                <h2><?= e(tr('Residential & Commercial Customers')) ?></h2>
                <ul class="check-list">
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong><?= e(tr('Residential customers')) ?></strong> — <?= e(tr('home scrap, old appliances, AC units and vehicles.')) ?></li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong><?= e(tr('Small businesses')) ?></strong> — <?= e(tr('workshops, restaurants, shops and warehouses.')) ?></li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong><?= e(tr('Factories')) ?></strong> — <?= e(tr('production waste, offcuts, machines and bulk metals.')) ?></li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong><?= e(tr('Contractors & construction companies')) ?></strong> — <?= e(tr('site clearance and demolition scrap.')) ?></li>
                </ul>
            </div>
            <div class="split__body">
                <p class="section-eyebrow"><?= e(tr('Why Choose Us')) ?></p>
                <h2><?= e(tr('The Scrap Buyer You Can Rely On')) ?></h2>
                <ul class="check-list">
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Fair Market Rates')) ?></li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Free Pickup')) ?></li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Same-Day Service')) ?></li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Instant Payment')) ?></li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Certified Weighing')) ?></li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Responsible Recycling')) ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('Service Area')) ?></p>
            <h2><?= e(tr('Proudly Serving Mecca, Jeddah & Taif')) ?></h2>
            <p class="section-sub"><?= e(tr('Select a city to see its service map — default is Mecca.')) ?></p>
        </header>
        <div class="map-card reveal">
            <?php render_location_tabs(); ?>
        </div>
    </div>
</section>

<?php render_cta(); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>
