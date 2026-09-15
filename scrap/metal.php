<?php
/* ============================================================
 * Metal Scrap Buyer in Dammam
 * ============================================================ */
$cat = scrap_category('metal');
$pageTitle       = 'Metal Scrap Buyer in Dammam';
$pageDescription = 'We buy metal scrap in Dammam — iron, steel, copper, aluminum, brass and stainless steel — with free pickup, certified weighing and instant payment. Get a quote on WhatsApp today.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'We Buy', 'url' => url('services')], ['label' => 'Metal Scrap']]); ?>
        <h1>Metal Scrap Buyer in <?= e(site('city')) ?></h1>
        <p>We purchase all kinds of metal scrap — iron, steel, copper, aluminum, brass and stainless steel — and pay the best rates per kilogram on the spot. Free pickup, certified weighing and instant payment across <?= e(site('service_area')) ?>.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, I have metal scrap to sell. Can you give me a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp a Photo</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
            <a class="btn btn--ghost" href="<?= e(url('scrap-pickup')) ?>">Request Pickup</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Metal Scrap Buying</p>
            <h2>Fair Prices for Every Metal You Have</h2>
            <p>Selling metal scrap should be simple. We grade your material by type, quote a transparent per-kilogram rate, and pay immediately after weighing. Whether it is a few copper pipes from a renovation, aluminum window frames, or a full load of mixed construction steel — we buy it all.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Iron, steel, copper, aluminum, brass and stainless steel</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> No minimum quantity — every kilogram counts</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Free pickup and certified weighing</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Cash or bank transfer on the same day</li>
            </ul>
            <a class="btn btn--primary" href="<?= e(url('scrap-pickup')) ?>">Book a Free Pickup</a>
        </div>
        <img src="<?= e(asset('images/scrap/metal.svg')) ?>" alt="Assorted metal scrap pile ready for grading and weighing" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Metals We Buy</p>
            <h2>Every Category, Priced Fairly</h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-industry" aria-hidden="true"></i> Iron &amp; Steel</h3>
                <p>Rebar, structural steel, sheet metal, pipes, beams, angles and cast iron — the backbone of most construction and industrial scrap.</p>
                <ul><li>Rebar &amp; mesh</li><li>Beams, columns &amp; channels</li><li>Pipes &amp; sheet</li></ul>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-fire-burner" aria-hidden="true"></i> Copper</h3>
                <p>Our highest-value metal. We buy wire, pipes, motors and mixed copper at grade-based rates.</p>
                <ul><li>Bare bright &amp; #1 / #2</li><li>Pipes &amp; fittings</li><li>Motors &amp; transformers</li></ul>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-cubes" aria-hidden="true"></i> Aluminum</h3>
                <p>Cans, sheets, extrusion profiles, window frames and AC parts — all bought at competitive rates.</p>
                <ul><li>Cans &amp; foil</li><li>Extrusion &amp; profiles</li><li>Wheels &amp; AC parts</li></ul>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-shield" aria-hidden="true"></i> Brass &amp; Stainless Steel</h3>
                <p>Fittings, kitchenware, sinks, industrial offcuts and stainless fabrication waste.</p>
                <ul><li>Brass fittings &amp; valves</li><li>Stainless 304 / 316</li><li>Industrial offcuts</li></ul>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container split split--reverse">
        <img src="<?= e(asset('images/scrap/scrap-yard.svg')) ?>" alt="Sorting ferrous and non-ferrous scrap at the yard" loading="lazy" width="560" height="420">
        <div class="split__body">
            <p class="section-eyebrow">Know Your Metal</p>
            <h2>Ferrous vs Non-Ferrous Scrap</h2>
            <table class="data table-wrap">
                <thead>
                    <tr><th>Type</th><th>Examples</th><th>Test</th></tr>
                </thead>
                <tbody>
                    <tr><td>Ferrous</td><td>Iron, steel, cast iron, rebar</td><td>Magnetic — a magnet sticks</td></tr>
                    <tr><td>Non-ferrous</td><td>Copper, aluminum, brass, stainless</td><td>Non-magnetic — no magnet attraction</td></tr>
                </tbody>
            </table>
            <p class="mt-1">Non-ferrous metals generally command much higher prices per kilogram than ferrous metals. Sorting your scrap by type before we arrive helps you get the best total price.</p>
            <div class="info-panel mt-1">
                <h3><i class="fa-solid fa-camera" aria-hidden="true"></i> Not Sure What Metal You Have?</h3>
                <p>Send a photo through WhatsApp and we will identify the material and quote the correct grade — at no cost and with no obligation.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Pricing &amp; Pickup</p>
            <h2>Transparent From Quote to Payment</h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-magnifying-glass-dollar"></i></span>
                <h3>1. Free Assessment</h3>
                <p>Photos or description → we grade the metal type and confirm the rate per kilogram.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-truck-fast"></i></span>
                <h3>2. Free Pickup</h3>
                <p>We load the scrap ourselves from your home, shop, warehouse or site — no effort from you.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-scale-balanced"></i></span>
                <h3>3. Weigh &amp; Pay</h3>
                <p>Certified weighing in front of you, total confirmed, then cash or bank transfer immediately.</p>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="split mb-3">
            <div class="split__body">
                <p class="section-eyebrow">Service Areas</p>
                <h2>Where We Collect Metal Scrap</h2>
                <p>Our trucks collect mixed and single-grade metal scrap across the Eastern Province, including Dammam, Khobar, Dhahran, Qatif, Jubail and Al-Ahsa.</p>
            </div>
            <ul class="check-list">
                <?php foreach (site('service_areas', []) as $area): ?>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e($area) ?> — same-day pickup whenever available</li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'What counts as “mixed metal scrap”?', 'answer' => 'Mixed or “shred” scrap is any load containing a combination of ferrous and non-ferrous metals. We sort and grade each type on site so you still receive fair per-type pricing.'],
    ['question' => 'Do you buy small quantities of metal?', 'answer' => 'Yes — there is no minimum. Even a few kilograms of copper wire or brass fittings is worth selling, and we apply the same per-kilogram rate.'],
    ['question' => 'How do you test whether metal is magnetic?', 'answer' => 'A simple magnet test distinguishes ferrous (magnetic) from non-ferrous (non-magnetic) metal. Use it to pre-sort your scrap at home.'],
    ['question' => 'Is brass worth more than aluminum?', 'answer' => 'Generally yes — brass typically commands a higher per-kilogram price than aluminum. Stainless steel and copper usually rank above both. We quote each type separately.'],
    ['question' => 'Can you pick up metal scrap from a construction site?', 'answer' => 'Yes, we collect rebar, structural steel and other metal scrap directly from active construction and demolition sites, including bulk loads.'],
];
render_faq($faqs, 'Metal Scrap FAQ');
?>

<?php render_cta(); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>