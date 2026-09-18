<?php
/* ============================================================
 * Cable & Wire Scrap Buyer in Saudi Arabia
 * ============================================================ */
$pageTitle       = 'Cable & Wire Scrap Buyer in Saudi Arabia';
$pageDescription = 'We buy cable and wire scrap in Saudi Arabia — copper cables, aluminum cables, insulated wire, electrical and communication cable, and industrial cable drums. Free pickup and instant payment.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'We Buy', 'url' => url('services')], ['label' => 'Cable & Wire']]); ?>
        <h1>Cable &amp; Wire Scrap Buyer in <?= e(site('city')) ?></h1>
        <p>Old wiring, communication cable, electrical offcuts and industrial drums — we buy them all. Copper content drives the value, and we grade it fairly with you before weighing.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, I have cable and wire scrap to sell. Can you give me a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp a Photo</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Cable &amp; Wire Buying</p>
            <h2>Copper Hides in Every Cable</h2>
            <p>Electrical cables and wires are among the most valuable scrap around because the copper inside them is highly sought after. Whether from a building renovation, an IT overhaul, or a factory re-cabling project, your cables are worth real money.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Copper cables and insulated wire</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Aluminum cables and communication cable</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Industrial multi-core cable and drums</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Machine and appliance wiring</li>
            </ul>
        </div>
        <img src="<?= e(asset('images/old-cable.jpg')) ?>" alt="Coils of scrap electrical cable and wire" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Cable Grades</p>
            <h2>How Cable Value Is Calculated</h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-circle-dot" aria-hidden="true"></i> Stripped Copper</h3>
                <p>Clean bright copper wire after stripping — the top cable value per kilogram.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-circle-notch" aria-hidden="true"></i> Insulated Copper</h3>
                <p>Priced by weight with the insulation percentage deducted from the copper rate.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-bolt" aria-hidden="true"></i> Aluminum Cable</h3>
                <p>Power transmission and feeder cable where aluminum replaces copper.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-ruler" aria-hidden="true"></i> Insulation Percentage</h3>
                <p>The thicker the insulation, the lower the recoverable copper content — we explain the calculation.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-layer-group" aria-hidden="true"></i> Cable Grade</h3>
                <p>Heavy power cable, strands, and fine communication wire each carry different rates.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-drum" aria-hidden="true"></i> Industrial Drums</h3>
                <p>Full or partial cable drums from contractors and factories — collected in bulk.</p>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Photo Quote</p>
            <h2>Wait, Don’t Strip Anything Yet</h2>
        </header>
        <div class="split">
            <img src="<?= e(asset('images/scrap/wire.svg')) ?>" alt="Unstripped insulated wire coil on a spool" loading="lazy" width="560" height="420">
            <div class="split__body">
                <p>Before you spend hours stripping cable, send us a photo. We will tell you exactly what the
                stripped versus insulated rate is and whether stripping is worth your time for the volume you have.</p>
                <div class="info-panel">
                    <h3><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Photo Quote</h3>
                    <p>Step 1: Photograph the cable drum, cut a short sample or show the reels.<br>
                    Step 2: Send it to <a href="<?= e(whatsapp_link('Hello, please quote my cable and wire scrap.')) ?>" target="_blank" rel="noopener">our WhatsApp</a>.<br>
                    Step 3: Receive today’s rate per kilogram for each grade — usually within minutes.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container split split--reverse">
        <img src="<?= e(asset('images/scrap/industrial.svg')) ?>" alt="Industrial cable drums collected from a worksite" loading="lazy" width="560" height="420">
        <div class="split__body">
            <p class="section-eyebrow">Bulk &amp; Industrial</p>
            <h2>Industrial Cable Collection</h2>
            <p>Contractors and electricians regularly end a project with kilometers of surplus cable. We provide
                bulk collection with certified weighing at the site, transparent insulation deductions and immediate
                payment — plus receipts for your records.</p>
            <a class="btn btn--primary" href="<?= e(url('contact-us')) ?>">Contact Us for Collection</a>
        </div>
    </div>
</section>

<?php
$faqs = [
    ['question' => 'How do you price insulated cable?', 'answer' => 'We weigh the cable, then estimate the copper content based on the insulation thickness and construction, and pay the copper rate on that content. The deduction is explained clearly on site.'],
    ['question' => 'Is it better to strip cable before selling?', 'answer' => 'Sometimes. Stripped copper pays more per kilogram, but stripping takes time. Send us photos first and we will tell you whether it is worth it for your volume.'],
    ['question' => 'Do you buy aluminum power cable?', 'answer' => 'Yes — aluminum transmission and feeder cable is bought at the aluminum cable rate, which is lower than copper cable but still valuable.'],
    ['question' => 'Can you take cable drums?', 'answer' => 'Yes. Wooden and steel drums are collected during bulk pickups; steel drums are valuable on their own.'],
    ['question' => 'Do you buy fiber-optic and communication cable?', 'answer' => 'We buy communication and co-axial cable for their copper content. Pure fiber-optic cable without copper has limited scrap value — send a photo and we will confirm.'],
];
render_faq($faqs, 'Cable & Wire FAQ');
?>

<?php render_cta('Selling Surplus Cable?', 'Message us photos of your cable for today’s rate per kilogram. Bulk pickup with certified weighing available in Mecca, Jeddah & Taif, Saudi Arabia.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>