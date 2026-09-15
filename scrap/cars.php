<?php
/* ============================================================
 * Car & Vehicle Scrap Buyer in Dammam
 * ============================================================ */
$pageTitle       = 'Car & Vehicle Scrap Buyer in Dammam';
$pageDescription = 'We buy junk cars and scrap vehicles in Dammam — cars, engines, gearboxes, batteries, radiators and vehicle metal — with free towing, fair assessment and instant payment.';

include __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'We Buy', 'url' => url('services')], ['label' => 'Cars & Vehicles']]); ?>
        <h1>Car &amp; Vehicle Scrap Buyer in <?= e(site('city')) ?></h1>
        <p>That damaged or abandoned vehicle is still worth money. We buy junk cars, scrap vehicles, engines, gearboxes, batteries, radiators and vehicle metal — with free towing and payment on the spot.</p>
        <div class="page-hero__cta">
            <a class="btn btn--wa" href="<?= e(whatsapp_link('Hello, I have a scrap car/vehicle to sell.')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Vehicle Details</a>
            <a class="btn btn--outline" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__body">
            <p class="section-eyebrow">Vehicle Buying</p>
            <h2>Turn That Old Car Into Cash Today</h2>
            <p>From accident-damaged cars to decades-old trucks, vehicle metal is valuable. We handle the entire process — assessment, towing, weighing and payment — and take care of the paperwork with you.</p>
            <ul class="check-list mb-2">
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Junk, damaged or non-running cars and trucks</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Engines, gearboxes, radiators and batteries</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Free towing within our service areas</li>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Cash or bank transfer paid at pickup</li>
            </ul>
        </div>
        <img src="<?= e(asset('images/scrap/car.svg')) ?>" alt="Junk car being prepared for scrap collection" loading="lazy" width="560" height="420">
    </div>
</section>

<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">What We Buy</p>
            <h2>Vehicles &amp; Parts We Purchase</h2>
        </header>
        <div class="material-grid">
            <article class="material-card">
                <h3><i class="fa-solid fa-car-burst" aria-hidden="true"></i> Junk Cars</h3>
                <p>Accident-damaged, abandoned or non-running passenger cars — any make and model.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-truck-pickup" aria-hidden="true"></i> Trucks &amp; Vans</h3>
                <p>Light trucks, vans, worker buses and heavy vehicles bought by weight.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-gear" aria-hidden="true"></i> Engines &amp; Gearboxes</h3>
                <p>Complete engines, gearboxes and transmissions — often worth more than general scrap.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-car-battery" aria-hidden="true"></i> Batteries</h3>
                <p>Old car and truck batteries purchased separately at the battery rate.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-temperature-arrow-down" aria-hidden="true"></i> Radiators</h3>
                <p>Copper and aluminum radiators, heater cores and condensers.</p>
            </article>
            <article class="material-card">
                <h3><i class="fa-solid fa-car-side" aria-hidden="true"></i> Vehicle Metal</h3>
                <p>Bare shells, panels, suspensions, wheels and mixed vehicle metal.</p>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Sell Your Scrap Car</p>
            <h2>How Vehicle Scrapping Works</h2>
        </header>
        <div class="steps-grid">
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-truck-pickup"></i></span>
                <h3>1. Vehicle Pickup</h3>
                <p>A flatbed or recovery truck collects the vehicle from your location — free of charge.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-magnifying-glass-chart"></i></span>
                <h3>2. Assessment</h3>
                <p>We assess the vehicle’s weight, condition and valuable components, and confirm a price with you.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-scale-balanced"></i></span>
                <h3>3. Weighing</h3>
                <p>The vehicle is weighed on certified scales — you see the figure and the calculation.</p>
            </article>
            <article class="step-card reveal">
                <span class="step-card__icon" aria-hidden="true"><i class="fa-solid fa-money-bill-wave"></i></span>
                <h3>4. Price Confirmation &amp; Payment</h3>
                <p>You approve the total and receive cash or bank transfer right away.</p>
            </article>
        </div>
        <div class="info-panel mt-2">
            <h3><i class="fa-solid fa-wallet" aria-hidden="true"></i> Getting the Best Price for Your Vehicle</h3>
            <p>Vehicles with intact engines, gearboxes, batteries, radiators and catalytic converters are worth
                significantly more than a bare shell. Send us the details and photos of your vehicle and we will
                assess the true value before towing.</p>
        </div>
    </div>
</section>
<section class="section section--surface">
    <div class="container">
        <header class="section-head">
            <p class="section-eyebrow">Vehicle Inquiry</p>
            <h2>Tell Us About Your Vehicle</h2>
        </header>
        <form class="form-card" action="<?= e(url('actions/contact')) ?>" method="post" enctype="multipart/form-data" data-validate novalidate>
            <?= csrf_field() ?>
            <?= honeypot_field() ?>
            <div class="form-grid">
                <div class="field">
                    <label for="veh-name">Your Name <span class="req" aria-hidden="true">*</span></label>
                    <input type="text" id="veh-name" name="name" required maxlength="100">
                </div>
                <div class="field">
                    <label for="veh-phone">Phone <span class="req" aria-hidden="true">*</span></label>
                    <input type="tel" id="veh-phone" name="phone" required pattern="[0-9+ ]{7,15}">
                </div>
                <div class="field field--full">
                    <label for="veh-message">Vehicle Details <span class="req" aria-hidden="true">*</span></label>
                    <textarea id="veh-message" name="message" required maxlength="2000" placeholder="Make, model, year, condition, location, and any parts that make it special…"></textarea>
                </div>
                <div class="field field--full">
                    <label>Vehicle Photos</label>
                    <div class="file-drop" data-dropzone>
                        <i class="fa-solid fa-images" aria-hidden="true"></i>
                        Drop photos here or click to choose (JPG, PNG, WEBP)
                        <input type="file" name="photos[]" accept=".jpg,.jpeg,.png,.webp" multiple data-files="[data-dropzone]" hidden>
                        <div class="file-list" aria-live="polite"></div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="scrap_type" value="Cars & Vehicles">
            <input type="hidden" name="location" value="Dammam">
            <div class="form-actions">
                <button class="btn btn--primary" type="submit"><i class="fa-solid fa-car-burst" aria-hidden="true"></i> Sell Your Scrap Car</button>
                <a class="btn btn--text" href="<?= e(whatsapp_link('Hello, I have a scrap vehicle to sell.')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            </div>
        </form>
    </div>
</section>
<?php
$faqs = [
    ['question' => 'Do you buy cars that do not run?', 'answer' => 'Yes — non-running, damaged and abandoned vehicles are exactly what we buy. We tow them free of charge within our service areas.'],
    ['question' => 'Do I need the car’s registration documents?', 'answer' => 'You must be the legal owner of the vehicle. Saudi vehicle registration (Istimara) or equivalent ownership documents are required before scrapping, and we guide you through it.'],
    ['question' => 'Can you pick up vehicles from inside compounds or buildings?', 'answer' => 'Yes, we routinely recover vehicles from compounds and underground parking, provided we have vehicle access.'],
    ['question' => 'How is the price of a scrap car calculated?', 'answer' => 'The price is based on the vehicle weight, the current metal market, and any high-value parts such as batteries, radiators, engines and catalytic converters.'],
    ['question' => 'How fast can you tow the vehicle?', 'answer' => 'In most cases within 24 hours, and often the same day for vehicles in Dammam and nearby cities.'],
];
render_faq($faqs, 'Vehicle Scrap FAQ');
?>

<?php render_cta('Have a Junk Vehicle?', 'Message us the make, model and a few photos on WhatsApp for an instant assessment — free towing and same-day payment.'); ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>