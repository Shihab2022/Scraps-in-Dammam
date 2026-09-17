<?php
/* ============================================================
 * Homepage
 * ============================================================ */
$pageTitle       = site('site_name') . ' — ' . site('tagline');
$pageDescription = 'Professional scrap metal buyer in Dammam. Free pickup, certified weighing, fair prices and instant payment for metal, copper, aluminum, cables, AC units, cars and industrial scrap.';
$businessSchema  = true;

include __DIR__ . '/../includes/header.php';
?>

<!-- ================= HERO ================= -->
<section class="hero">
    <div class="container hero__inner">
        <div class="hero__content">
            <span class="hero__eyebrow"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
                <?= e(site('hero.eyebrow')) ?></span>
            <h1><?= site('hero.heading') ?></h1>
            <p class="lead"><?= e(site('hero.subtext')) ?></p>
            <div class="hero__actions">
                <a class="btn btn--wa btn--lg" href="<?= e(whatsapp_link('Hello, I have scrap to sell. Can you provide a quote?')) ?>" target="_blank" rel="noopener">
                    <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(site('hero.primary_cta')) ?></a>
                <a class="btn btn--outline btn--lg" href="<?= e(phone_href()) ?>">
                    <i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(site('hero.secondary_cta')) ?></a>
            </div>
        </div>
        <figure class="hero__media">
            <img src="<?= e(asset('images/hero/hero.svg')) ?>" alt="Scrap yard in Dammam with metal, copper and aluminum ready for pickup" width="640" height="480" fetchpriority="high">
            <figcaption class="hero__media-card">
                <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
                <span><strong>Certified weighing</strong> on every pickup · Payment on the spot</span>
            </figcaption>
        </figure>
    </div>
</section>

<!-- ================= TRUST BADGES ================= -->
<section class="trust-strip" aria-label="Why customers trust us">
    <div class="container">
        <div class="trust-grid">
            <?php foreach (site('badges', []) as $badge): ?>
            <div class="trust-item">
                <span class="trust-item__icon" aria-hidden="true"><i class="fa-solid <?= e($badge['icon']) ?>"></i></span>
                <div>
                    <h3><?= e($badge['title']) ?></h3>
                    <p><?= e($badge['text']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ================= STATS ================= -->
<section class="stats-band" aria-label="Company statistics">
    <div class="container">
        <div class="stats-grid">
            <div class="stat"><strong><?= e(site('stats.years_experience')) ?>+</strong><span>Years Experience</span></div>
            <div class="stat"><strong><?= e(site('stats.customer_count')) ?></strong><span>Customers Served</span></div>
            <div class="stat"><strong><?= e(site('stats.pickup_time')) ?></strong><span>Pickup Service</span></div>
            <div class="stat"><strong><?= e(site('stats.weighing')) ?></strong><span>Weighing</span></div>
        </div>
    </div>
</section>

<!-- ================= ABOUT ================= -->
<section class="section section--surface" id="about">
    <div class="container split">
        <img src="<?= e(asset('images/scrap/scrap-yard.svg')) ?>" alt="Modern scrap yard with sorted metal bales" loading="lazy" width="560" height="420">
        <div class="split__body">
            <p class="section-eyebrow">About Us</p>
            <h2>Trusted Scrap Buyer in <?= e(site('city')) ?></h2>
            <p>We are a professional scrap buying company serving <?= e(site('service_area')) ?>. For more than
            <?= e(site('stats.years_experience')) ?> years we have helped homeowners, businesses and factories turn
            unwanted metal, appliances and vehicles into instant cash.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Residential, commercial and factory scrap buying</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Fair, market-based pricing confirmed before pickup</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Accurate certified weighing on a calibrated scale</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Fast same-day pickup and immediate payment</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Environmentally responsible recycling partnerships</li>
            </ul>
            <a class="btn btn--primary" href="<?= e(url('about-us')) ?>">Learn More
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
    </div>
</section>
<!-- ================= WHAT SCRAP WE BUY ================= -->
<section class="section" id="we-buy">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">What We Buy</p>
            <h2>Scrap Materials We Purchase</h2>
            <p class="section-sub">Fair prices for every type of scrap — from a bag of copper wire to a full factory load.</p>
        </header>
        <div class="scrap-grid">
            <?php foreach ($scrapCategories as $cat) render_scrap_card($cat); ?>
        </div>
    </div>
</section>

<!-- ================= HOW IT WORKS ================= -->
<section class="section section--surface" id="how-it-works">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">How It Works</p>
            <h2>Selling Scrap Takes 3 Simple Steps</h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">01</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-phone-volume"></i></span>
                <h3>Call or WhatsApp Us</h3>
                <p>Tell us what scrap you have, where you are, and optionally <a href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener">send photos on WhatsApp</a>.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">02</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                <h3>Get a Fair Price</h3>
                <p>We assess the material and confirm the exact price per kilogram before we arrange pickup.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__num" aria-hidden="true">03</span>
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-truck-ramp-box"></i></span>
                <h3>Pickup &amp; Instant Payment</h3>
                <p>We weigh the material on site with certified scales and pay you immediately — cash or bank transfer.</p>
            </article>
        </div>
    </div>
</section>

<!-- ================= WHY CHOOSE US ================= -->
<section class="section" id="why-choose-us">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Why Choose Us</p>
            <h2>The Honest &amp; Fast Scrap Buyer</h2>
        </header>
        <div class="why-grid">
            <?php
            $reasons = [
                ['fa-sack-dollar',  'Best Market Rates',       'Competitive, transparent pricing based on current market rates.'],
                ['fa-truck-fast',   'Free Pickup',             'Doorstep collection in Dammam, Eastern, Saudi Arabia.'],
                ['fa-bolt',         'Same-Day Service',        'Fast response and pickup whenever same-day service is available.'],
                ['fa-money-bill-wave','Instant Payment',       'Payment immediately after weighing and price confirmation.'],
                ['fa-scale-balanced','Certified Weighing',     'Accurate digital scales, calibrated and verified.'],
                ['fa-recycle',      'Responsible Recycling',   'Environmentally responsible processing of every material we buy.'],
            ];
            foreach ($reasons as $r): ?>
            <article class="why-card reveal">
                <span class="why-card__icon" aria-hidden="true"><i class="fa-solid <?= $r[0] ?>"></i></span>
                <div>
                    <h3><?= e($r[1]) ?></h3>
                    <p><?= e($r[2]) ?></p>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ================= SERVICE AREAS ================= -->
<section class="section section--surface" id="service-areas">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Service Areas</p>
            <h2>Free Scrap Pickup in Dammam</h2>
            <p class="section-sub">Our base location: Dammam, Eastern, Saudi Arabia.</p>
        </header>
        <div class="map-card">
            <iframe src="<?= e(site('map_embed')) ?>" title="Map — <?= e(site('service_area')) ?>"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
            <ul class="map-card__list">
                <li><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Dammam, Eastern, Saudi Arabia</li>
            </ul>
        </div>
    </div>
</section>
<?php render_testimonials(); ?>

<?php
// ================= HOMEPAGE FAQ =================
$faqs = [
    ['question' => 'Who is the best scrap buyer in the area?',
     'answer'   => 'A reliable scrap buyer offers free pickup, certified weighing, transparent market-based pricing and immediate payment — which is exactly what we provide. Check our WhatsApp or call us for a same-day quotation and compare for yourself.'],
    ['question' => 'Do you offer same-day scrap pickup?',
     'answer'   => 'Yes, in most cases we can arrange same-day pickup in Dammam when slots are available. Call or WhatsApp us in the morning with your scrap type and address and we will confirm the earliest loading time.'],
    ['question' => 'What types of scrap do you buy?',
     'answer'   => 'We Buy All Types Scrap Metal — Copper, Old Cable, Used Battery, Aluminum, Iron Steel, Wood, S.S. Steel & All Mix Scrap. If you are unsure, send us a photo on WhatsApp.'],
    ['question' => 'How is the scrap price calculated?',
     'answer'   => 'Prices are based on the current international market rates, the material grade, weight and cleanliness. We confirm the rate per kilogram before pickup, then weigh the material with certified scales on site.'],
    ['question' => 'Do you pay cash on the same day?',
     'answer'   => 'Yes. Payment is made immediately after weighing and confirmation — either in cash or by bank transfer, whichever you prefer.'],
    ['question' => 'Is there a minimum quantity?',
     'answer'   => 'No. We buy everything from a few kilograms of copper wire to complete factory loads. Pricing per kilogram is the same regardless of quantity.'],
    ['question' => 'Which areas do you serve?',
     'answer'   => 'Our base location is Dammam, Eastern, Saudi Arabia with free pickup.'],
    ['question' => 'Can I send photos through WhatsApp?',
     'answer'   => 'Absolutely — this is the fastest way to get a quote. Send clear photos of your scrap and we will assess the material type and approximate value quickly.'],
    ['question' => 'Do you buy mixed scrap?',
     'answer'   => 'Yes, we buy mixed metal loads. We grade the material by type on arrival or on site, so mixed loads still get a fair per-type price.'],
    ['question' => 'Do you buy industrial scrap?',
     'answer'   => 'Yes. We purchase factory production waste, offcuts, HMS 1 and 2, machinery scrap, industrial cables and more, with site inspections and scheduled bulk collection for factories and warehouses.'],
];
render_faq($faqs, 'Scrap Buyer FAQ', 'Answers to the questions we hear most often from sellers in Dammam, Eastern, Saudi Arabia.');
?>

<?php render_cta(); ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>