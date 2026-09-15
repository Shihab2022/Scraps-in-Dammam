<?php
/**
 * Contact form handler.
 * Validates input, stores the request, emails the business and redirects to /thank-you.
 */
declare(strict_types=1);
require __DIR__ . '/../includes/bootstrap.php';
require __DIR__ . '/../includes/security.php';
require __DIR__ . '/../includes/storage.php';
require __DIR__ . '/../includes/mailer.php';

$errors = [];

// ---- CSRF ----
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_verify(post('csrf_token'))) {
    flash_set('error', 'Invalid or expired form token. Please try again.');
    redirect('contact-us');
}

// ---- Rate limiting: 5 requests / 15 min per IP ----
$rl = rate_limit_allowed('contact', 5, 900);
if (!$rl['allowed']) {
    flash_set('error', 'Too many requests. Please try again in ' . ceil($rl['retry_after'] / 60) . ' minutes.');
    redirect('contact-us');
}

// ---- Honeypot ----
if (!honeypot_verified()) {
    redirect('thank-you'); // silently drop bot submissions
}

// ---- Fields ----
$name      = post('name');
$phone     = post('phone');
$email     = post('email');
$scrapType = post('scrap_type');
$location  = post('location');
$message   = post('message');

if (mb_strlen($name) < 2 || mb_strlen($name) > 100)        $errors[] = 'Please enter your full name.';
if (!valid_phone($phone))                                  $errors[] = 'Please enter a valid phone number.';
if (!valid_email($email))                                  $errors[] = 'Please enter a valid email address.';
if ($scrapType === '')                                     $errors[] = 'Please select the scrap type.';
if ($location === '')                                      $errors[] = 'Please select your location.';
if (mb_strlen($message) < 10 || mb_strlen($message) > 2000)$errors[] = 'Please describe your scrap (minimum 10 characters).';

// ---- Uploads ----
$uploadResult = handle_uploads('photos', 4, 5242880);
if (!$uploadResult['ok']) {
    foreach ($uploadResult['errors'] as $err) $errors[] = $err;
}

if ($errors) {
    flash_set('error', 'Please fix the following and resubmit: ' . implode(' · ', array_slice($errors, 0, 3)));
    redirect('contact-us');
}

// ---- Persist ----
$leadId = store_request('contact', [
    'name'       => $name,
    'phone'      => $phone,
    'email'      => $email,
    'scrap_type' => $scrapType,
    'location'   => $location,
    'message'    => $message,
    '_files'     => $uploadResult['files'],
]);

// ---- Email ----
$subject = 'New Contact Request — ' . site('site_name');
$html = build_lead_html('New Contact Request', [
    'Name'       => $name,
    'Phone'      => $phone,
    'Email'      => $email,
    'Scrap Type' => $scrapType,
    'Location'   => $location,
    'Message'    => $message,
], !empty($uploadResult['files']));
send_notification($subject, $html, $uploadResult['files']);

app_log("contact_request #{$leadId} from {$phone}");
redirect('thank-you');