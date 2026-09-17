<?php
/* ============================================================
 * Iron & Steel Scrap Buyer in Dammam
 * ============================================================ */
$pageTitle       = 'Iron & Steel Scrap Buyer in Dammam';
$pageDescription = 'We buy iron and steel scrap in Dammam — rebar, structural steel, beams, pipes, sheet metal and cast iron. Free pickup, certified weighing and instant payment in Dammam, Eastern, Saudi Arabia.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'We Buy', 'url' => url('services')], ['label' => 'Iron & Steel']]); ?>
        <h1>Iron &amp; Steel Scrap Buyer in <?= e(site('city')) ?></h1>
        <p>We buy rebar, structural steel, sheet metal, pipes, cast iron, beams, angles and channels — from single household items to complete building demolitions. Fair per-kilogram pricing, free pickup and certified weighing.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, I have iron and steel scrap to sell. Can you give me a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp a Photo</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
            <a class="btn btn--ghost" href="<?= e(url('contact-us')) ?>">Contact Us</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Iron &amp; Steel Buying</p>
            <h2>Heavy Metal, Honest Weight, Fast Cash</h2>
            <p>Iron and steel form the largest share of most scrap loads. Whether it is a pile of rebar from a razed villa, structural steel offcuts from a fabrication shop, or old machinery, we buy it by the kilogram with rates confirmed before pickup.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Rebar, beams, columns, angles, channels and pipes</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Sheet metal, plate, cast iron and alloy steels</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Bulk loads and site clearance with truck collection</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Cash or bank transfer immediately after weighing</li>
            </ul>
        </div>
        <img src="<?= e(asset('images/iron-steel.jpg')) ?>" alt="Stacked iron and steel structural steel scrap beams" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Types of Iron &amp; Steel We Buy</p>
            <h2>From Rebar to Cast Iron</h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-bars-staggered" aria-hidden="true"></i> Rebar &amp; Mesh</h3>
                <p>Construction rebar, welded mesh and tie wire from building sites and demolitions.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-building-columns" aria-hidden="true"></i> Structural Steel</h3>
                <p>Beams (I, H, U), columns, angles, channels and plate from fabricated structures.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-sheet-plastic" aria-hidden="true"></i> Sheet Metal</h3>
                <p>Flat sheets, corrugated panels, cladding and punching offcuts from workshops.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-circle-half-stroke" aria-hidden="true"></i> Steel Pipes</h3>
                <p>Water, gas, oil and structural pipes — steel or ductile iron, any diameter.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-gears" aria-hidden="true"></i> Cast Iron</h3>
                <p>Engine blocks, manhole covers, machinery bases and old radiators.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-toolbox" aria-hidden="true"></i> Mixed Steel</h3>
                <p>Garage clean-outs, farm steel, gates, frames and assorted household steel.</p>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container split split--reverse">
        <img src="<?= e(asset('images/scrap/steel.svg')) ?>" alt="Steel beams and pipes graded for recycling" loading="lazy" width="560" height="420">
        <div class="split__body">
            <p class="section-eyebrow">Grades Matter</p>
            <h2>Rebar vs Structural Steel</h2>
            <p>Not all steel is priced the same. Heavy structural sections and clean plate generally earn a better rate than mixed light steel or rusty rebar — just as clean material beats contaminated loads.</p>
            <ul class="check-list">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Grading</strong> — heavy, medium and light steel are priced separately</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Cleanliness</strong> — concrete, insulation and attachments reduce the usable weight</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Moisture</strong> — wet or oily material weighs more but pays on dry weight terms</li>
            </ul>
            <div class="info-panel mt-1">
                <h3><i class="fa-solid fa-camera" aria-hidden="true"></i> Not Sure What Grade Your Steel Is?</h3>
                <p>Offer a WhatsApp photo assessment — send a clear picture of your steel and we will grade it and quote you immediately.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Pricing &amp; Pickup</p>
            <h2>How Payment Works for Steel Scrap</h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-scale-balanced"></i></span>
                <h3>1. Certified Weighing</h3>
                <p>Digital, calibrated scales weigh the steel in front of you — at your site or at our yard.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-layer-group"></i></span>
                <h3>2. Grading</h3>
                <p>Steel is classified as heavy, medium or light, and deductions for attached material are explained clearly.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-file-signature"></i></span>
                <h3>3. Price Confirmation</h3>
                <p>You approve the rate and the calculated total before any money changes hands.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-money-bill-wave"></i></span>
                <h3>4. Immediate Payment</h3>
                <p>Cash or bank transfer on the spot — the same day, every time.</p>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split mb-3">
        <div class="split__body">
            <p class="section-eyebrow">Service Areas</p>
            <h2>Iron Steel Scrap Pickup in Dammam</h2>
            <p>We collect iron and steel scrap anywhere in Dammam, Eastern, Saudi Arabia — including active construction sites, warehouses and industrial zones.</p>
        </div>
        <ul class="check-list">
            <?php foreach (site('service_areas', []) as $area): ?>
            <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e($area) ?> — truck collection available</li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'Do you pay more for structural steel than rebar?', 'answer' => 'In most cases clean heavy structural steel achieves a higher rate than light or rusty rebar because it yields better mill specifications. We quote each grade transparently.'],
    ['question' => 'Can you remove steel beams from a building?', 'answer' => 'Yes — we work with contractors and demolition teams to remove, cut and collect structural steel during site clearance. Call us for a site inspection.'],
    ['question' => 'Do you buy rusty steel?', 'answer' => 'Yes, rusty steel is still recyclable and we buy it — though heavy corrosion can affect the grade and therefore the rate per kilogram.'],
    ['question' => 'Is there a minimum amount of steel?', 'answer' => 'No minimum for pickup. For small household loads we usually combine collection with other scrap types.'],
    ['question' => 'What is deducted from the weight?', 'answer' => 'We weigh the steel that is actually sold. Attached concrete, insulation, wood or plastic are removed or clarified before weighing so the weight is fair.'],
];
render_faq($faqs, 'Iron & Steel FAQ');
?>

<?php render_cta(); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>