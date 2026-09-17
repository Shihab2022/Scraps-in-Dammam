<?php
/* ============================================================
 * Copper Scrap Buyer in Dammam
 * ============================================================ */
$pageTitle       = 'Copper Scrap Buyer in Dammam';
$pageDescription = 'We buy copper scrap in Dammam — bare bright, #1 and #2 copper, insulated wire, pipes, motors and cable at top grade-based rates. Free pickup, certified weighing and instant payment.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'We Buy', 'url' => url('services')], ['label' => 'Copper']]); ?>
        <h1>Copper Scrap Buyer in <?= e(site('city')) ?></h1>
        <p>Copper is the highest-value scrap metal we buy. Bare bright, #1 and #2 copper, insulated wire, pipes, motors and cable — all purchased at fair, transparent grade-based rates across <?= e(site('service_area')) ?>.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, I have copper scrap to sell. Can you give me a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp a Photo</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
            <a class="btn btn--ghost" href="<?= e(url('contact-us')) ?>">Contact Us</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Copper Buying</p>
            <h2>The Highest-Paying Metal You Can Sell</h2>
            <p>Because copper is so valuable, even small amounts are worth selling. Plumbing pipes from a renovation, wiring from a demolished building, burnt-out motors from workshops — we will pick it up for free and pay you the correct grade rate.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Bare bright, #1, #2, insulated wire, pipes, motors, cable</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Grade verified with you before weighing</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Free pickup, certified weighing, instant payment</li>
            </ul>
        </div>
        <img src="<?= e(asset('images/copper.jpg')) ?>" alt="Copper wire, pipes and cable scrap ready for grading" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Copper Grades</p>
            <h2>Copper Grade Comparison</h2>
        </header>
        <div class="table-wrap">
            <table class="data">
                <thead>
                    <tr><th>Grade</th><th>Description</th><th>Relative Value</th></tr>
                </thead>
                <tbody>
                    <tr><td>Bare Bright Copper</td><td>Clean, uncoated, unalloyed bright copper wire — no insulation, tin, solder or corrosion.</td><td><span class="badge-tag">Highest</span></td></tr>
                    <tr><td>#1 Copper</td><td>Clean copper wire and pipe with a bright shiny surface, free of attachments and oxidation.</td><td><span class="badge-tag">Very High</span></td></tr>
                    <tr><td>#2 Copper</td><td>Clean copper with oxidation or light tarnish; may include soldered, painted or slightly contaminated pipe.</td><td><span class="badge-tag">High</span></td></tr>
                    <tr><td>Insulated Copper Wire</td><td>Copper wire still covered with insulation. Value depends on the copper content (insulation percentage).</td><td><span class="badge-tag">Medium</span></td></tr>
                    <tr><td>Copper Motors</td><td>Electric motors — paid on weight and recoverable copper, with the casing deducted.</td><td><span class="badge-tag">Medium</span></td></tr>
                </tbody>
            </table>
        </div>
        <p class="mt-2 lead-text">Prices change with the market. We confirm today’s rate per kilogram for your exact grade before any pickup — <a href="<?= e(whatsapp_link('Hello, can you quote my copper scrap grade?')) ?>" target="_blank" rel="noopener">message us for a current quote</a>.</p>
    </div>
</section>
<section class="section">
    <div class="container split split--reverse">
        <img src="<?= e(asset('images/old-cable.jpg')) ?>" alt="Bundle of insulated copper cable prepared for recycling" loading="lazy" width="560" height="420">
        <div class="split__body">
            <p class="section-eyebrow">Why Grade Matters</p>
            <h2>Why Copper Grade Matters</h2>
            <p>Five factors determine what your copper is worth:</p>
            <ul class="check-list">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Cleanliness</strong> — free of solder, steel, plastic and other metals</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Insulation</strong> — stripping wire raises its grade and value</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Oxidation</strong> — tarnished, burnt or weathered copper drops a grade</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Contamination</strong> — oil, glue or attached fittings reduce the usable weight</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <strong>Grade</strong> — bare bright, #1 and #2 each have distinct market rates</li>
            </ul>
            <p class="mt-1">Unsure of the grade? Send a clear photo on WhatsApp — we identify the grade and quote you within minutes.</p>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Pricing &amp; Pickup</p>
            <h2>Simple, Transparent Copper Sales</h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-magnifying-glass-dollar" aria-hidden="true"></i> Grade Check</h3>
                <p>We verify the copper grade with you, either from photos or on site before weighing.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-scale-balanced" aria-hidden="true"></i> Certified Weighing</h3>
                <p>Certified digital scales — you watch the reading and the calculation.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-money-bill-wave" aria-hidden="true"></i> Instant Payment</h3>
                <p>Cash or bank transfer immediately after the total is agreed.</p>
            </article>
        </div>
        <div class="info-panel mt-2">
            <h3><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Quote CTA</h3>
            <p>Photograph your copper and send it to
                <a href="<?= e(whatsapp_link('Hello, please quote my copper scrap.')) ?>" target="_blank" rel="noopener">our WhatsApp</a> —
                tell us whether it is wire, pipe, motors or cable, and we will reply with today’s rate per kilogram.</p>
        </div>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'What is the difference between #1 and #2 copper?', 'answer' => '#1 copper is clean, bright and free of solder, paint and heavy oxidation. #2 copper includes tarnished, soldered or slightly contaminated copper. The cleaner the copper, the higher the rate.'],
    ['question' => 'Should I strip my copper wire before selling?', 'answer' => 'Stripping copper wire increases its grade and per-kilogram price. Whether it is worth your time depends on the volume — send us photos and we can advise.'],
    ['question' => 'Do you buy burnt copper wire?', 'answer' => 'Yes, but burnt or heavily oxidised wire is graded lower than clean wire and is weighed as is.'],
    ['question' => 'How do you pay for copper motors?', 'answer' => 'Motors are weighed whole and paid at the motor rate, which reflects the recoverable copper after the steel casing is deducted.'],
    ['question' => 'Is copper worth more than aluminum?', 'answer' => 'Yes — copper is consistently among the highest-value scrap metals, typically worth several times more per kilogram than aluminum.'],
];
render_faq($faqs, 'Copper Scrap FAQ');
?>

<?php render_cta('Have Copper to Sell?', 'Copper pays top rates per kilogram. Send a WhatsApp photo today for today’s grade-based quote — free pickup included.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>