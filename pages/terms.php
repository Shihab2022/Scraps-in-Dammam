<?php
/* ============================================================
 * Terms & Conditions
 * ============================================================ */
$pageTitle       = 'Terms & Conditions';
$pageDescription = 'Terms and conditions for using our scrap buying website and services in Dammam and the Eastern Province, Saudi Arabia.';

include __DIR__ . '/../includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <?php render_breadcrumbs([['label' => 'Terms']]); ?>
        <h1>Terms &amp; Conditions</h1>
        <p>Last updated: January 2026</p>
    </div>
</section>

<section class="section">
    <div class="container container--narrow legal">
        <h2>1. Agreement</h2>
        <p>By using this website, requesting a quote or a pickup, you agree to these Terms and Conditions between you and <?= e(site('company')) ?>.</p>

        <h2>2. Services</h2>
        <p>We purchase scrap metal and materials as described on this website, with pricing quoted per kilogram based on current market rates, material grade and condition. All prices are indicative until confirmed at weighing. Payment is made after weighing and mutual confirmation of the total.</p>

        <h2>3. Quotes and Pricing</h2>
        <p>Quotes provided by phone, WhatsApp or email are estimates based on the information you provide and may change after physical inspection. Factors such as contamination, moisture, insulation content and grade can affect the final price. We will always confirm the final rate and total before payment.</p>

        <h2>4. Pickup</h2>
        <p>Pickup is free within our listed service areas. You are responsible for ensuring the site is accessible to our collection vehicle and that the material is safe to handle. We may reschedule pickup where access is unsafe or where vehicle entry is not possible.</p>

        <h2>5. Ownership and Legality</h2>
        <p>You confirm that you own, or have the legal right to sell, all scrap material offered to us, and that it is not stolen, illegally obtained or subject to third-party claims. You agree to comply with all applicable laws of the Kingdom of Saudi Arabia.</p>

        <h2>6. Hazardous Materials</h2>
        <p>We do not accept hazardous, radioactive, chemical or regulated waste. Where such materials are found in a load, we reserve the right to refuse the load and refuse payment, and you agree to remove such materials at your own cost.</p>

        <h2>7. Title Transfer</h2>
        <p>Ownership of all material is transferred to us upon pickup and payment. By accepting payment you release us from claims relating to the material.</p>

        <h2>8. Limitation of Liability</h2>
        <p>Our maximum liability arising out of these terms is limited to the amount paid (if any) paid for the material in question. We are not liable for indirect or indirect consequential loss.</p>

        <h2>9. Website Use</h2>
        <p>You agree not to misuse this website, including attempting to disrupt it, gaining unauthorised access, or submitting false or harmful content.</p>

        <h2>10. Governing Law</h2>
        <p>These terms are governed by the laws of the Kingdom of Saudi Arabia. Any dispute shall be subject to the exclusive jurisdiction of the courts of Dammam.</p>
    </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>