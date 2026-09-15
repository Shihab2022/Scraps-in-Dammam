<?php
/* ============================================================
 * About Us
 * ============================================================ */
$pageTitle       = 'About Us';
$pageDescription = 'Learn about our scrap buying company in Dammam — our story, the scrap we buy, how we work, who we serve, and why customers choose us across the Eastern Province.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'About Us']]); ?>
        <h1>About Us</h1>
        <p>We are a professional scrap buying company based in <?= e(site('city')) ?>, helping homeowners, businesses and factories turn scrap metal into instant cash — with transparent pricing, certified weighing and fast pickup.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <p class="section-eyebrow">Our Story</p>
            <h2>Built on Trust, Fast Payment &amp; Recycling</h2>
            <p>What started as a small family trading business in Dammam more than <?= e(site('stats.years_experience')) ?> years ago is today a full-service scrap buying operation covering the Eastern Province. We grew by doing one thing consistently: paying fairly, weighing transparently and picking up fast.</p>
            <p>Today we serve residential customers, shops, maintenance workshops, contractors, warehouses and factories across Dammam, Khobar, Dhahran, Qatif, Jubail and Al-Ahsa. Every kilogram we buy is graded honestly, weighed on certified scales and processed responsibly with licensed recycling partners.</p>
            <p>We believe that selling scrap should be simple, transparent and profitable for the seller. That is why we confirm the price before we arrive, pay immediately after weighing, and never ask you to transport heavy material yourself.</p>
        </div>
        <img src="<?= e(asset('images/scrap/scrap-yard.svg')) ?>" alt="Our team sorting scrap at the yard in Dammam" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">What We Buy</p>
            <h2>Every Type of Scrap, One Phone Call</h2>
        </header>
        <div class="scrap-grid">
            <?php foreach ($scrapCategories as $cat) render_scrap_card($cat); ?>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">How We Work</p>
            <h2>From First Call to Instant Payment</h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">01</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-phone-volume"></i></span>
                <h3>Call or WhatsApp</h3>
                <p>Tell us what scrap you have and where you are located.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">02</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                <h3>Receive a Price Quote</h3>
                <p>We confirm the rate per kilogram before any pickup is arranged.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">03</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                <h3>Pickup &amp; Payment</h3>
                <p>We weigh on site with certified scales and pay immediately.</p>
            </article>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <div class="split mb-3">
            <div class="split__body">
                <p class="section-eyebrow">Who We Serve</p>
                <h2>Residential &amp; Commercial Customers</h2>
                <ul class="check-list">
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Residential customers</strong> — home scrap, old appliances, AC units and vehicles.</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Small businesses</strong> — workshops, restaurants, shops and warehouses.</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Factories</strong> — production waste, offcuts, machines and bulk metals.</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Contractors &amp; construction companies</strong> — site clearance and demolition scrap.</li>
                </ul>
            </div>
            <div class="split__body">
                <p class="section-eyebrow">Why Choose Us</p>
                <h2>The Scrap Buyer You Can Rely On</h2>
                <ul class="check-list">
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Fair Market Rates</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Free Pickup</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Same-Day Service</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Instant Payment</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Certified Weighing</li>
                    <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Responsible Recycling</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Service Area</p>
            <h2>Proudly Serving the Eastern Province</h2>
        </header>
        <div class="map-card">
            <iframe src="<?= e(site('map_embed')) ?>" title="Service area map of <?= e(site('service_area')) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
            <ul class="map-card__list">
                <?php foreach (site('service_areas', []) as $area): ?>
                <li><i class="fa-solid fa-location-dot" aria-hidden="true"></i> <?= e($area) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<?php render_cta(); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>