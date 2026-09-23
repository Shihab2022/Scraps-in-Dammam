<?php
/* ============================================================
 * Privacy Policy
 * ============================================================ */
$pageTitle       = tr('Privacy Policy');
$pageDescription = tr('Our privacy policy — how we collect, use, store and protect personal information submitted through our scrap buying website.');

include __DIR__ . '/../includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <h1><?= e(tr('Privacy Policy')) ?></h1>
        <p><?= e(tr('Last updated: January 2026')) ?></p>
    </div>
</section>

<section class="section">
    <div class="container container--narrow legal">
        <h2><?= e(tr('1. Who We Are')) ?></h2>
        <p><strong><?= e(ts('company')) ?></strong> (operating as “<?= e(ts('site_name')) ?>”, <?= e(ts('address')) ?>) <?= e(tr('is the data controller for the personal information you provide through this website.')) ?> <?= e(tr('Contact us at')) ?> <?= e(ts('email')) ?> <?= e(tr('or')) ?> <?= e(ts('phone')) ?> <?= e(tr('for any privacy question.')) ?></p>

        <h2><?= e(tr('2. Information We Collect')) ?></h2>
        <p><?= e(tr('When you submit a contact, pickup or industrial request form we collect the information you enter: name, phone number, WhatsApp number, email address, scrap type, location, address, dates, message text, and any photos you upload. We also collect basic technical data such as your IP address and requested pages to maintain security and prevent abuse.')) ?></p>

        <h2><?= e(tr('3. Why We Use Your Information')) ?></h2>
        <ul class="check-list">
            <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('To respond to your scrap quote or pickup request.')) ?></li>
            <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('To arrange weighing, pickup and payment.')) ?></li>
            <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('For security, fraud prevention and spam control.')) ?></li>
            <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= e(tr('Where you ask us to, to contact you by phone, WhatsApp or email about our services.')) ?></li>
        </ul>

        <h2><?= e(tr('4. Legal Basis')) ?></h2>
        <p><?= e(tr('We rely on your consent (you submit the form), on the performance of a contract or pre-contractual steps (fulfilling your pickup request), and on legitimate interests (security and record keeping) as legal bases for processing.')) ?></p>

        <h2><?= e(tr('5. Storage and Retention')) ?></h2>
        <p><?= e(tr('Request data is stored in our secure database (or, if a database is not configured, in protected log files) and is retained for as long as needed to fulfil your request and to comply with legal obligations. Uploaded photos are stored in a protected directory accessible only to our team.')) ?></p>

        <h2><?= e(tr('6. Who We Share Data With')) ?></h2>
        <p><?= e(tr('We do not sell personal information. Data is shared only with our own team members and trusted service providers (such as email transmission or hosting providers) who process data on our behalf and under our instructions.')) ?></p>

        <h2><?= e(tr('7. Third-Party Services')) ?></h2>
        <p><?= e(tr('This website may load Google Maps embeds, fonts and icon libraries from third-party providers. Those providers may process technical data under their own privacy policies.')) ?></p>

        <h2><?= e(tr('8. Cookies')) ?></h2>
        <p><?= e(tr('We use only essential session cookies to keep you logged into the admin panel and to protect forms from abuse. We do not use advertising or analytics tracking cookies.')) ?></p>

        <h2><?= e(tr('9. Your Rights')) ?></h2>
        <p><?= e(tr('You may request access to, correction of, or deletion of your personal data.')) ?> <?= e(tr('To exercise these rights, contact us at')) ?> <?= e(ts('email')) ?>. <?= e(tr('We respond to verified requests within 30 days.')) ?></p>

        <h2><?= e(tr('10. Security')) ?></h2>
        <p><?= e(tr('We use HTTPS where supported, hashed admin passwords, CSRF protection, input validation and restricted directory permissions to protect your data.')) ?></p>

        <h2><?= e(tr('11. Changes to This Policy')) ?></h2>
        <p><?= e(tr('We may update this policy from time to time. Changes will be published on this page with an updated date.')) ?></p>
    </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
