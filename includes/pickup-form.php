<?php
/**
 * Scrap pickup request form. Posts to /actions/pickup-request
 */
declare(strict_types=1);
function render_pickup_form(): void
{
    $scrapTypes = ['Copper','Old Cable','Used Battery','Aluminum','Iron Steel','Wood','S.S. Steel','Metal Scrap','Industrial / Factory','Cars & Vehicles','Construction & Demolition','All Mix Scrap','Mixed / Not Sure'];
    $locations = ['Dammam'];
    ?>
    <form class="form-card" action="<?= e(url('actions/pickup-request')) ?>" method="post"
          enctype="multipart/form-data" data-validate novalidate>
        <?= csrf_field() ?>
        <?= honeypot_field() ?>
        <h2 class="mb-2">Request a Scrap Pickup</h2>
        <div class="form-grid">
            <div class="field">
                <label for="pu-name">Full Name <span class="req" aria-hidden="true">*</span></label>
                <input type="text" id="pu-name" name="name" required autocomplete="name" placeholder="Your full name">
            </div>
            <div class="field">
                <label for="pu-phone">Phone <span class="req" aria-hidden="true">*</span></label>
                <input type="tel" id="pu-phone" name="phone" required autocomplete="tel" pattern="[0-9+ ]{7,15}" placeholder="+966 5X XXX XXXX">
            </div>
            <div class="field">
                <label for="pu-whatsapp">WhatsApp Number</label>
                <input type="tel" id="pu-whatsapp" name="whatsapp" pattern="[0-9+ ]{7,15}" placeholder="+966 5X XXX XXXX">
            </div>
            <div class="field">
                <label for="pu-scrap">Scrap Category <span class="req" aria-hidden="true">*</span></label>
                <select id="pu-scrap" name="scrap_type" required>
                    <option value="">Select category…</option>
                    <?php foreach ($scrapTypes as $t): ?><option value="<?= e($t) ?>"><?= e($t) ?></option><?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="pu-weight">Estimated Weight</label>
                <input type="text" id="pu-weight" name="estimated_weight" maxlength="80" placeholder="e.g. 300 kg / 1.5 tonnes">
            </div>
            <div class="field">
                <label for="pu-location">City</label>
                <input type="text" id="pu-location" value="Dammam" disabled>
                <input type="hidden" name="location" value="Dammam">
            </div>
            <div class="field field--full">
                <label for="pu-address">Pickup Address <span class="req" aria-hidden="true">*</span></label>
                <input type="text" id="pu-address" name="address" required maxlength="200" placeholder="Street, district, landmark">
            </div>
            <div class="field">
                <label for="pu-date">Preferred Pickup Date</label>
                <input type="date" id="pu-date" name="pickup_date" min="<?= date('Y-m-d') ?>">
            </div>
            <div class="field">
                <label for="pu-time">Preferred Time</label>
                <input type="time" id="pu-time" name="pickup_time">
            </div>
            <div class="field field--full">
                <label for="pu-desc">Scrap Description <span class="req" aria-hidden="true">*</span></label>
                <textarea id="pu-desc" name="description" required maxlength="2000" placeholder="Describe the scrap, quantity, condition and location details…"></textarea>
            </div>
            <div class="field field--full">
                <label for="pu-message">Additional Notes</label>
                <textarea id="pu-message" name="message" maxlength="2000" placeholder="Any instructions for our driver…"></textarea>
            </div>
            <div class="field field--full">
                <label>Scrap Photos <span class="field-help">(optional, max 5 MB each)</span></label>
                <div class="file-drop" data-dropzone>
                    <i class="fa-solid fa-images" aria-hidden="true"></i>
                    Drop photos here or click to choose (JPG, PNG, WEBP)
                    <input type="file" id="pu-photos" name="photos[]" accept=".jpg,.jpeg,.png,.webp"
                           multiple data-files="[data-dropzone]" hidden>
                    <div class="file-list" aria-live="polite"></div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn--primary" type="submit"><i class="fa-solid fa-truck-fast" aria-hidden="true"></i> Request Pickup</button>
            <a class="btn btn--text" href="<?= e(whatsapp_link('Hello, I would like to request a scrap pickup.')) ?>" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp Us</a>
            <a class="btn btn--text" href="<?= e(phone_href()) ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> Call Now</a>
        </div>
        <p class="form-note mt-1">Free pickup within our service areas. We confirm the date and time with you before dispatch.</p>
    </form>
    <?php
}