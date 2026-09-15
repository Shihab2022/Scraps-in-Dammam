<?php
/* ============================================================
 * Scrap Buyer in Khobar
 * ============================================================ */
$pageTitle       = 'Scrap Buyer in Khobar';
$pageDescription = 'Scrap buyer in Khobar — residential and commercial scrap, old ACs and appliances, copper, aluminum, iron, vehicle scrap and free pickup with certified weighing and instant payment.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'Locations'], ['label' => 'Khobar']]); ?>
        <h1>Scrap Buyer in Khobar</h1>
        <p>From the villas of a southern Khobar compound to busy restaurant kitchens and maintenance workshops —
           we buy residential and commercial scrap all over the city, with courteous door-to-door pickup and
           payment on the spot.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, we have scrap in Khobar. Can you give us a quote?')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Khobar</p>
            <h2>Residential &amp; Commercial Scrap Buying in Khobar</h2>
            <p>Khobar is packed with villas being renovated, restaurants upgrading kitchens, and workshops with
                metal offcuts piling up. We make it convenient: tell us what you have on WhatsApp, we confirm the
                price, and a truck arrives — often the same day — to load, weigh and pay.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Old AC units and appliances removed for free</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Copper, aluminum and iron from renovations</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Restaurant and shop equipment scrap</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Damaged vehicles with free towing</li>
            </ul>
        </div>
        <img src="<?= e(asset('images/scrap/ac.svg')) ?>" alt="Old AC unit and appliances picked up from a Khobar home" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Khobar Services</p>
            <h2>Popular Services in Khobar</h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-snowflake" aria-hidden="true"></i> AC &amp; Appliance Removal</h3>
                <p>Old split and window ACs, fridges, washers and water heaters — free removal from any level.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-fire-burner" aria-hidden="true"></i> Copper &amp; Aluminum</h3>
                <p>Plumbing copper, wiring, window frames and kitchen aluminum priced at full grade rates.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-industry" aria-hidden="true"></i> Iron &amp; Steel</h3>
                <p>Garage gates, structural offcuts, pipes and workshop steel collected quickly.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-car-burst" aria-hidden="true"></i> Vehicle Scrap</h3>
                <p>Junk cars, engines and vehicle metal towed from homes and compounds free of charge.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-store" aria-hidden="true"></i> Commercial Pickup</h3>
                <p>Restaurants, shops and gyms — bulk equipment and appliance removal on schedule.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-house-circle-check" aria-hidden="true"></i> Renovation Clean-Out</h3>
                <p>Post-renovation metal waste collected in one visit — floors cleared, material paid for.</p>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Khobar Pickup</p>
            <h2>Fast Pickup Service in Khobar</h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-calendar-day"></i></span>
                <h3>1. Same-Day Slots</h3>
                <p>Morning requests in Khobar usually get same-day or next-morning collection slots.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-scale-balanced"></i></span>
                <h3>2. Weigh at Your Door</h3>
                <p>Certified mobile scales weigh the material on site, in front of you.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-money-bill-wave"></i></span>
                <h3>3. Instant Payment</h3>
                <p>Cash or bank transfer immediately — before the truck leaves your gate.</p>
            </article>
        </div>
    </div>
</section>

<section class="section section--surface">
    <div class="container split split--reverse">
        <img src="<?= e(asset('images/scrap/car.svg')) ?>" alt="Damaged vehicle collected for scrap in Khobar" loading="lazy" width="560" height="420">
        <div class="split__body">
            <p class="section-eyebrow">Vehicles in Khobar</p>
            <h2>Junk Vehicles — Free Towing, Paid on the Spot</h2>
            <p>Compounds and residential streets in Khobar are full of vehicles that no longer run. If you own
                one, it is still worth real money. We tow it free, confirm the price with you after assessment,
                and pay immediately. Registration (Istimara) or proof of ownership is required.</p>
            <a class="btn btn--primary mt-1" href="<?= e(url('car-scrap-buyer-dammam')) ?>">Vehicle Scrap Details</a>
        </div>
    </div>
</section>

<?php render_location_extras('scrap-buyer-khobar'); ?>

<?php
$faqs = [
    ['question' => 'Do you collect scrap from Khobar compounds?', 'answer' => 'Yes — we are experienced with compound access and visitor procedures, and we coordinate with the management office in advance for a smooth pickup.'],
    ['question' => 'Can you remove restaurant kitchen equipment?', 'answer' => 'Yes. Stainless steel tables, hoods, walk-in freezer parts and old cooking equipment are bought at the stainless rate and removed on schedule.'],
    ['question' => 'Do you pay cash in Khobar?', 'answer' => 'Yes — cash or bank transfer is arranged at the time of weighing, whichever you prefer.'],
    ['question' => 'How soon after renovation should I call?', 'answer' => 'Call as soon as the crew is done. Leftover copper pipes and aluminum frames are valuable — often covering a good share of the renovation cost.'],
];
render_faq($faqs, 'Khobar Scrap FAQ');
?>

<?php render_cta('Scrap in Khobar?', 'Send a WhatsApp photo of your scrap or appliances today — same-day pickup slots and instant payment across the city.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>