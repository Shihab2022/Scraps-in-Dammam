<?php
/* ============================================================
 * Scrap Buyer in Al-Ahsa / Hofuf
 * ============================================================ */
$pageTitle       = 'Scrap Buyer in Al-Ahsa / Hofuf';
$pageDescription = 'Scrap buyer in Al-Ahsa and Hofuf — metal scrap, copper, aluminum, appliances, vehicles and construction scrap with residential and business pickup, certified weighing and instant payment.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'Locations'], ['label' => 'Al-Ahsa / Hofuf']]); ?>
        <h1>Scrap Buyer in Al-Ahsa / Hofuf</h1>
        <p>Al-Ahsa is the Kingdom’s largest oasis — a mix of farmlands, heritage districts and a fast-growing
           urban centre. We travel across the governorate, from Hofuf to Al-Mubarraz and the farm roads beyond,
           buying metal scrap, copper, aluminum, appliances, vehicles and construction scrap.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, we have scrap in Al-Ahsa. Can you give us a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Al-Ahsa / Hofuf</p>
            <h2>From the Palm Farms to the City Centre</h2>
            <p>Al-Ahsa’s steel workshops, agricultural suppliers and construction projects all produce scrap worth
                recovering. We understand the long distances across the governorate — so we plan efficient routes,
                arrive on time and make sure your scrap is turned into cash with the same certified weighing and
                instant payment you would get in Dammam.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Metal scrap, copper, aluminum and brass</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Appliances, AC units and vehicles</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Construction and farm scrap</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Residential and business pickup</li>
            </ul>
        </div>
        <img src="<?= e(asset('images/scrap/metal.svg')) ?>" alt="Sorted metal scrap collected from farms and workshops near Hofuf" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Al-Ahsa Services</p>
            <h2>Scrap Services Across the Oasis</h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-tree" aria-hidden="true"></i> Farm &amp; Workshop Scrap</h3>
                <p>Old water tanks, pipes, gates, machinery and steel from farms, dairies and workshops.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-fire-burner" aria-hidden="true"></i> Copper &amp; Aluminum</h3>
                <p>Plumbing copper, wiring, aluminum windows and AC condensing units — full grade rates.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-tv" aria-hidden="true"></i> Appliances &amp; ACs</h3>
                <p>Old refrigerators, washing machines, water heaters and AC units removed and paid for.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-car-burst" aria-hidden="true"></i> Vehicles</h3>
                <p>Junk cars, trucks and vehicle parts picked up from farms, compounds and city streets.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-helmet-safety" aria-hidden="true"></i> Construction Scrap</h3>
                <p>Rebar, structural steel and pipe from residential projects and infrastructure works.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-building" aria-hidden="true"></i> Business Pickup</h3>
                <p>Shops, hotels, schools and warehouses — scheduled collection that suits your operation.</p>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">How It Works Here</p>
            <h2>Simple Selling in Al-Ahsa</h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-camera"></i></span>
                <h3>1. Send Details</h3>
                <p>Photos on WhatsApp help us quote fast — even from remote farm locations.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-truck"></i></span>
                <h3>2. Pickup Scheduled</h3>
                <p>We plan efficient routes so every part of the governorate is covered.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-money-bill-wave"></i></span>
                <h3>3. Pay on the Spot</h3>
                <p>Certified weighing at your location, then cash or bank transfer immediately.</p>
            </article>
        </div>
        <div class="info-panel mt-2">
            <h3><i class="fa-solid fa-location-dot" aria-hidden="true"></i> We Cover the Whole Governorate</h3>
            <p>Hofuf, Al-Mubarraz, Al-Omran, Al-Hasa farms and industrial areas, Al-Shifa, and the surrounding
                villages. If you are unsure whether we cover your spot, ask on WhatsApp — we will tell you honestly.</p>
        </div>
    </div>
</section>

<?php render_location_extras('scrap-buyer-in-al-ahsa'); ?>

<?php
$faqs = [
    ['question' => 'Do you collect scrap from farms in Al-Ahsa?', 'answer' => 'Yes — farm tanks, metal fences, machinery and vehicle scrap are collected from farms across the oasis. Send photos so we can quote and plan the route.'],
    ['question' => 'How far will you travel in the governorate?', 'answer' => 'We cover Hofuf, Al-Mubarraz, Al-Omran, Al-Shifa and surrounding farm areas. For very remote locations contact us and we will confirm the service and any travel terms.'],
    ['question' => 'Can you help clear a demolished farm house?', 'answer' => 'Yes — the metal fraction of demolition waste (rebar, frames, pipes) is bought and cleared, leaving you with only the non-metal rubble.'],
    ['question' => 'Do you buy old building materials like pipes and tanks?', 'answer' => 'Yes. Steel and aluminum pipes, water tanks, gates and construction leftovers are all purchased at current metal rates.'],
];
render_faq($faqs, 'Al-Ahsa Scrap FAQ');
?>

<?php render_cta('Scrap in Al-Ahsa or Hofuf?', 'Message us photos of your scrap today — we quote quickly, schedule your pickup and pay on the spot anywhere across the governorate.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>