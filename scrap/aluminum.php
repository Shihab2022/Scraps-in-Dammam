<?php
/* ============================================================
 * Aluminum Scrap Buyer in Saudi Arabia
 * ============================================================ */
$pageTitle       = 'Aluminum Scrap Buyer in Saudi Arabia';
$pageDescription = 'We buy aluminum scrap in Saudi Arabia — cans, sheets, extrusion, window frames, profiles, AC aluminum, wheels and mixed aluminum. Free pickup, certified weighing and instant payment.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'We Buy', 'url' => url('services')], ['label' => 'Aluminum']]); ?>
        <h1>Aluminum Scrap Buyer in <?= e(site('city')) ?></h1>
        <p>Aluminum is lightweight, everywhere, and worth recycling. We buy cans, sheets, extrusion, window frames, AC parts, wheels and mixed aluminum at competitive per-kilogram rates with free pickup.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, I have aluminum scrap to sell. Can you give me a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp a Photo</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Aluminum Buying</p>
            <h2>From Cans to Curtain Walls</h2>
            <p>Aluminum scrap comes from everywhere — kitchens, workshops, windows and AC units. Because it is classed into different grades (clean extrusion, sheets, cast, cans), sorting it pays. We grade your aluminum with you and quote before pickup.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Cans, foil and clean old sheet</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Extrusion, profiles and window frames</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> AC condensers, radiators and cast parts</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Wheels/rims and mixed aluminum</li>
            </ul>
        </div>
        <img src="<?= e(asset('images/aluminum.jpg')) ?>" alt="Stacked aluminum profiles and sheet scrap" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Aluminum Grades</p>
            <h2>Understanding Aluminum Grades</h2>
        </header>
        <div class="table-wrap">
            <table class="data">
                <thead>
                    <tr><th>Aluminum Grade</th><th>What It Includes</th><th>Comment</th></tr>
                </thead>
                <tbody>
                    <tr><td>Clean Extrusion</td><td>Clean profiles, bars and window frames without paint, rubber or glass</td><td>Top aluminum rate</td></tr>
                    <tr><td>Old Sheet</td><td>Roofting sheets, sign panels, kitchen sheet with paint or minimal attachments</td><td>Second rate</td></tr>
                    <tr><td>Cans</td><td>Beverage cans, crushed or whole, ideally clean</td><td>Special can rate</td></tr>
                    <tr><td>Cast Aluminum</td><td>Engine blocks, cookware, cast AC parts</td><td>Cast grade rate</td></tr>
                    <tr><td>Mixed Aluminum</td><td>Combined grades in one load</td><td>Graded by sorting</td></tr>
                    <tr><td>Aluminum Wheels</td><td>Car and truck rims (alloy wheels)</td><td>Priced as cast/alloy</td></tr>
                </tbody>
            </table>
        </div>
        <p class="mt-2 lead-text">Rates follow the market and are confirmed at the time of your inquiry. Clean, sorted aluminum always earns a better price — and we pay for every kilogram, starting with the first one.</p>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Pricing &amp; Pickup</p>
            <h2>Pricing and Pickup for Aluminum</h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-gauge-high"></i></span>
                <h3>1. Grade Check</h3>
                <p>We identify the aluminum class — extrusion, sheet, cans, cast or mixed — and confirm the rate.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-truck-fast"></i></span>
                <h3>2. Free Pickup</h3>
                <p>Residential or commercial, we collect your aluminum anywhere in <?= e(site('service_area')) ?>.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-money-bill-wave"></i></span>
                <h3>3. Weigh &amp; Pay</h3>
                <p>Certified weighing in front of you, then immediate cash or bank transfer.</p>
            </article>
        </div>
        <div class="info-panel mt-2">
            <h3><i class="fa-solid fa-lightbulb" aria-hidden="true"></i> Quick Tip</h3>
            <p>Separating clean extrusion from painted sheet and cast parts can raise your total by a noticeable margin. Not sure how to sort it? Send a photo on
                <a href="<?= e(whatsapp_link('Hello, please advise on my aluminum scrap grades.')) ?>" target="_blank" rel="noopener">WhatsApp</a> and we will guide you.</p>
        </div>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'Do you buy aluminum cans?', 'answer' => 'Yes — crushed or whole cans are bought at the beverage-can rate. Clean, dry cans achieve the best price.'],
    ['question' => 'Are windows and frames with glass acceptable?', 'answer' => 'Yes. We can remove the glass and rubber when the item is quartered, and pay for the aluminum content on the clean extrusion rate.'],
    ['question' => 'Is aluminum worth more than iron?', 'answer' => 'Yes — clean aluminum typically earns several times more per kilogram than iron or steel.'],
    ['question' => 'Do you buy alloy wheels?', 'answer' => 'Yes, alloy car and truck wheels (rims) are purchased at the cast/alloy aluminum rate.'],
    ['question' => 'Can you collect large volumes of aluminum from a factory?', 'answer' => 'Yes, we provide regular bulk collection for manufacturers and fabricators producing aluminum offcuts and production waste.'],
];
render_faq($faqs, 'Aluminum Scrap FAQ');
?>

<?php render_cta('Have Aluminum to Sell?', 'Send photos of your aluminum on WhatsApp for today’s rate, and we will arrange free pickup with certified weighing and instant payment.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>