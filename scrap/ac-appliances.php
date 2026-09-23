<?php
/* ============================================================
 * AC & Appliances Scrap Buyer in Saudi Arabia
 * ============================================================ */
$pageTitle       = tr('AC & Appliance Scrap Buyer in Saudi Arabia');
$pageDescription = tr('We buy old AC units and appliances in Saudi Arabia — split and window ACs, refrigerators, washing machines, dryers, motors and compressors — with free pickup and instant payment.');

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('AC & Appliance Scrap Buyer in :city', [':city' => ts('city')])) ?></h1>
        <p><?= e(tr('Old air conditioners and appliances are bulky, heavy and full of recoverable metal. We remove them for free — including the lifting and loading — and pay you on the spot after weighing.')) ?></p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link(tr('Hello, I have an old AC/appliance to sell. Can you pick it up?'))) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> <?= e(tr('WhatsApp Us')) ?></a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?= e(tr('Call Now')) ?></a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow"><?= e(tr('AC & Appliance Buying')) ?></p>
            <h2><?= e(tr('We Take Your Old Appliances Away — For Free')) ?></h2>
            <p><?= e(tr('Replacing an AC or appliance? Instead of paying someone to haul the old unit away, sell it to us. ACs contain valuable copper and aluminum in their coils and compressors hold reusable copper motors. We handle the heavy lifting, transport and responsible recycling.')) ?></p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Split, window and central AC units')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Refrigerators, freezers, washing machines and dryers')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Motors, compressors and electrical appliances')) ?></li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Free removal from any floor — we lift and carry')) ?></li>
            </ul>
        </div>
        <img src="<?= e(asset('images/ac-appliances.avif')) ?>" alt="<?= e(tr('Old split air-conditioning unit ready for removal')) ?>" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('What We Remove')) ?></p>
            <h2><?= e(tr('Appliances We Collect & Pay For')) ?></h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-snowflake" aria-hidden="true"></i> <?= e(tr('AC Units')) ?></h3>
                <p><?= e(tr('Split, window and central AC units — indoor and outdoor units both collected.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-temperature-low" aria-hidden="true"></i> <?= e(tr('Fridges & Freezers')) ?></h3>
                <p><?= e(tr('Old refrigerators and freezers with or without cooling gas removed safely.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-shirt" aria-hidden="true"></i> <?= e(tr('Washers & Dryers')) ?></h3>
                <p><?= e(tr('Washing machines and dryers from homes, laundries and hotels.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-fan" aria-hidden="true"></i> <?= e(tr('Motors & Compressors')) ?></h3>
                <p><?= e(tr('Compressors from ACs and motors from appliances paid by weight.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-plug" aria-hidden="true"></i> <?= e(tr('Electrical Appliances')) ?></h3>
                <p><?= e(tr('Dishwashers, water heaters, ovens and other household electricals.')) ?></p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-water" aria-hidden="true"></i> <?= e(tr('Water Heaters & Tanks')) ?></h3>
                <p><?= e(tr('Steel and tank-type water heaters collected with their copper elements valued separately.')) ?></p>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow"><?= e(tr('Free Removal')) ?></p>
            <h2><?= e(tr('Pickup, Removal & Safe Recycling')) ?></h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-phone-volume"></i></span>
                <h3><?= e(tr('1. Describe Your Appliances')) ?></h3>
                <p><?= e(tr('Tell us what you have — number of units and type — or send a WhatsApp photo.')) ?></p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-truck-fast"></i></span>
                <h3><?= e(tr('2. We Remove & Weigh')) ?></h3>
                <p><?= e(tr('Our team lifts the units, loads the truck, and weighs the metal content with certified scales.')) ?></p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-money-bill-wave"></i></span>
                <h3><?= e(tr('3. Instant Payment')) ?></h3>
                <p><?= e(tr('Cash or bank transfer on the spot — and the old units are gone the same day.')) ?></p>
            </article>
        </div>
        <div class="info-panel mt-2">
            <h3><i class="fa-solid fa-leaf" aria-hidden="true"></i> <?= e(tr('Safe, Responsible Disposal')) ?></h3>
            <p><?= e(tr('Appliances and AC units are drained and processed at licensed facilities. Refrigerant gas is handled only by our licensed partners — we never release it into the environment. We do not accept hazardous or radioactive materials of any kind.')) ?></p>
        </div>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'Do you really pick up AC units for free?', 'answer' => 'Yes. Removal and pickup of old AC units and appliances is free within our service areas — we even lift units from upper floors.'],
    ['question' => 'Do I need to disconnect the AC before pickup?', 'answer' => 'Yes, electrical disconnection is required before our team handles the unit. We can advise by phone if you are unsure.'],
    ['question' => 'How do you value an old refrigerator?', 'answer' => 'Appliances are paid by weight and content — the steel body plus copper tubing, aluminum parts and (if separated) the compressor.'],
    ['question' => 'Do you buy compressors separately?', 'answer' => 'Yes. Compressors separated from AC units and fridges are bought at the motor/compressor rate by weight.'],
    ['question' => 'Can you remove several appliances at once?', 'answer' => 'Absolutely — many customers clear an entire kitchen or villa in a single visit. Bulk appliance loads get priority scheduling.'],
];
foreach ($faqs as &$f) { $f['question'] = tr($f['question']); $f['answer'] = tr($f['answer']); }
unset($f);
render_faq($faqs, 'AC & Appliance FAQ');
?>

<?php render_cta('Removing an Old AC or Appliance?', 'Call or WhatsApp us before you pay for removal — we take the unit away for free and pay you for the scrap metal it contains.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>