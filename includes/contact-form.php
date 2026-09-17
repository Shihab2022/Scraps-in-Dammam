<?php
/**
 * Contact form — reused on the contact page and contact section.
 * Posts to /actions/contact
 */
declare(strict_types=1);
function render_contact_form(string $context = 'contact'): void
{
    $scrapTypes = ['Copper','Old Cable','Used Battery','Aluminum','Iron Steel','Wood','S.S. Steel','Metal Scrap','Industrial / Factory','Cars & Vehicles','Construction & Demolition','All Mix Scrap','Mixed / Not Sure'];
    $locations = ['Dammam'];
    ?>
    <form class="form-card" action="<?= e(url('actions/contact')) ?>" method="post"
          enctype="multipart/form-data" data-validate novalidate>
        <?= csrf_field() ?>
        <?= honeypot_field() ?>
        <div class="form-grid">
            <div class="field">
                <label for="cf-name">Full Name <span class="req" aria-hidden="true">*</span></label>
                <input type="text" id="cf-name" name="name" required autocomplete="name"
                       minlength="2" maxlength="100" placeholder="Your full name">
            </div>
            <div class="field">
                <label for="cf-phone">Phone <span class="req" aria-hidden="true">*</span></label>
                <input type="tel" id="cf-phone" name="phone" required autocomplete="tel"
                       pattern="[0-9+ ]{7,15}" placeholder="+966 5X XXX XXXX">
            </div>
            <div class="field">
                <label for="cf-email">Email <span class="req" aria-hidden="true">*</span></label>
                <input type="email" id="cf-email" name="email" required autocomplete="email" placeholder="you@example.com">
            </div>
            <div class="field">
                <label for="cf-scrap">Scrap Type <span class="req" aria-hidden="true">*</span></label>
                <select id="cf-scrap" name="scrap_type" required>
                    <option value="">Select scrap type…</option>
                    <?php foreach ($scrapTypes as $t): ?><option value="<?= e($t) ?>"><?= e($t) ?></option><?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="cf-location">Location</label>
                <input type="text" id="cf-location" value="Dammam, Eastern, Saudi Arabia" disabled>
                <input type="hidden" name="location" value="Dammam">
            </div>
            <div class="field">
                <label for="cf-photos">Scrap Photos <span class="field-help">(optional, max 5 MB each)</span></label>
                <div class="file-drop" data-dropzone>
                    <i class="fa-solid fa-images" aria-hidden="true"></i>
                    Drop photos here or click to choose (JPG, PNG, WEBP)
                    <input type="file" id="cf-photos" name="photos[]" accept=".jpg,.jpeg,.png,.webp"
                           multiple data-files="[data-dropzone]" hidden>
                    <div class="file-list" aria-live="polite"></div>
                </div>
            </div>
            <div class="field field--full">
                <label for="cf-message">Message <span class="req" aria-hidden="true">*</span></label>
                <textarea id="cf-message" name="message" required maxlength="2000"
                          placeholder="Describe your scrap, approximate weight, and any pickup preferences…"></textarea>
            </div>
        </div>
        <?php if ($context === 'contact'): ?>
        <div class="form-actions">
            <button class="btn btn--primary" type="submit"><i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Send Request</button>
            <a class="btn btn--text" href="<?= e(whatsapp_link()) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--text" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
        <?php endif; ?>
        <p class="form-note mt-1">Your details are used only to respond to this request. Read our
            <a href="<?= e(url('privacy-policy')) ?>">privacy policy</a>.</p>
    </form>
    <?php
}