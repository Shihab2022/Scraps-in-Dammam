<?php
/* ============================================================
 * Aluminum Scrap Buyer in Saudi Arabia
 * ============================================================ */
$pageTitle       = tr('Aluminum Scrap Buyer in Saudi Arabia');
$pageDescription = tr('We buy aluminum scrap in Saudi Arabia — cans, sheets, extrusion, window frames, profiles, AC aluminum, wheels and mixed aluminum. Free pickup, certified weighing and instant payment.');

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('Aluminum Scrap Buyer in :city', [':city' => ts('city')])) ?></h1>
        <p><?= e(tr('Aluminum is lightweight, everywhere, and worth recycling. We buy cans, sheets, extrusion, window frames, AC parts, wheels and mixed aluminum at competitive per-kilogram rates with free pickup.')) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link(tr('Hello, I have aluminum scrap to sell. Can you give me a quote?'))) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp a Photo')) ?></a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow"><?= e(tr('Aluminum Buying')) ?></p>
            <h2><?= e(tr('From Cans to Curtain Walls')) ?></h2>
            <p><?= e(tr('Aluminum scrap comes from everywhere — kitchens, workshops, windows and AC units. Because it is classed into different grades (clean extrusion, sheets, cast, cans), sorting it pays. We grade your aluminum with you and quote before pickup.')) ?></p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Cans, foil and clean old sheet')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Extrusion, profiles and window frames')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('AC condensers, radiators and cast parts')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Wheels/rims and mixed aluminum')) ?></li>
            </ul>
        </div>
        <img src="<?= e(asset('images/aluminum.jpg')) ?>" alt="<?= e(tr('Stacked aluminum profiles and sheet scrap')) ?>" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('Aluminum Grades')) ?></p>
            <h2><?= e(tr('Understanding Aluminum Grades')) ?></h2>
        </header>
        <div class="table-wrap">
            <table class="data">
                <thead>
                    <tr><th><?= e(tr('Aluminum Grade')) ?></th><th><?= e(tr('What It Includes')) ?></th><th><?= e(tr('Comment')) ?></th></tr>
                </thead>
                <tbody>
                    <tr><td><?= e(tr('Clean Extrusion')) ?></td><td><?= e(tr('Clean profiles, bars and window frames without paint, rubber or glass')) ?></td><td><?= e(tr('Top aluminum rate')) ?></td></tr>
                    <tr><td><?= e(tr('Old Sheet')) ?></td><td><?= e(tr('Roofting sheets, sign panels, kitchen sheet with paint or minimal attachments')) ?></td><td><?= e(tr('Second rate')) ?></td></tr>
                    <tr><td><?= e(tr('Cans')) ?></td><td><?= e(tr('Beverage cans, crushed or whole, ideally clean')) ?></td><td><?= e(tr('Special can rate')) ?></td></tr>
                    <tr><td><?= e(tr('Cast Aluminum')) ?></td><td><?= e(tr('Engine blocks, cookware, cast AC parts')) ?></td><td><?= e(tr('Cast grade rate')) ?></td></tr>
                    <tr><td><?= e(tr('Mixed Aluminum')) ?></td><td><?= e(tr('Combined grades in one load')) ?></td><td><?= e(tr('Graded by sorting')) ?></td></tr>
                    <tr><td><?= e(tr('Aluminum Wheels')) ?></td><td><?= e(tr('Car and truck rims (alloy wheels)')) ?></td><td><?= e(tr('Priced as cast/alloy')) ?></td></tr>
                </tbody>
            </table>
        </div>
        <p class="mt-2 lead-text"><?= e(tr('Rates follow the market and are confirmed at the time of your inquiry. Clean, sorted aluminum always earns a better price — and we pay for every kilogram, starting with the first one.')) ?></p>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('Pricing & Pickup')) ?></p>
            <h2><?= e(tr('Pricing and Pickup for Aluminum')) ?></h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-gauge-high"></i></span>
                <h3><?= e(tr('1. Grade Check')) ?></h3>
                <p><?= e(tr('We identify the aluminum class — extrusion, sheet, cans, cast or mixed — and confirm the rate.')) ?></p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-truck-fast"></i></span>
                <h3><?= e(tr('2. Free Pickup')) ?></h3>
                <p><?= e(tr('Residential or commercial, we collect your aluminum anywhere in :area.', [':area' => ts('service_area')])) ?></p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-money-bill-wave"></i></span>
                <h3><?= e(tr('3. Weigh & Pay')) ?></h3>
                <p><?= e(tr('Certified weighing in front of you, then immediate cash or bank transfer.')) ?></p>
            </article>
        </div>
        <div class="info-panel mt-2">
            <h3><i class="fa-solid fa-lightbulb" aria-hidden="true"></i> <?= e(tr('Quick Tip')) ?></h3>
            <p><?= e(tr('Separating clean extrusion from painted sheet and cast parts can raise your total by a noticeable margin. Not sure how to sort it? Send a photo on')) ?>
                <a href="<?= e(whatsapp_link(tr('Hello, please advise on my aluminum scrap grades.'))) ?>" target="_blank" rel="noopener"><?= e(tr('WhatsApp')) ?></a> <?= e(tr('and we will guide you.')) ?></p>
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
foreach ($faqs as &$f) { $f['question'] = tr($f['question']); $f['answer'] = tr($f['answer']); }
unset($f);
render_faq($faqs, 'Aluminum Scrap FAQ');
?>

<?php render_cta('Have Aluminum to Sell?', 'Send photos of your aluminum on WhatsApp for today’s rate, and we will arrange free pickup with certified weighing and instant payment.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>