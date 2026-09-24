<?php
/**
 * Pickup request handler.
 */
declare(strict_types=1);
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/security.php';
require_once __DIR__ . '/../includes/storage.php';
require_once __DIR__ . '/../includes/mailer.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_verify(post('csrf_token'))) {
    flash_set('error', tr('Invalid or expired form token. Please try again.'));
    redirect('contact-us');
}

$rl = rate_limit_allowed('pickup', 4, 900);
if (!$rl['allowed']) {
    flash_set('error', tr('Too many requests. Try again in :minutes minutes.', [':minutes' => (string) ceil($rl['retry_after'] / 60)]));
    redirect('contact-us');
}

if (!honeypot_verified()) redirect('thank-you');

$name         = post('name');
$phone        = post('phone');
$whatsapp     = post('whatsapp');
$scrapType    = post('scrap_type');
$description  = post('description');
$estWeight    = post('estimated_weight');
$location     = post('location');
$address      = post('address');
$pickupDate   = post('pickup_date');
$pickupTime   = post('pickup_time');
$message      = post('message');

if (mb_strlen($name) < 2 || mb_strlen($name) > 100)          $errors[] = tr('Please enter your full name.');
if (!valid_phone($phone))                                    $errors[] = tr('Please enter a valid phone number.');
if ($whatsapp !== '' && !valid_phone($whatsapp))             $errors[] = tr('Please enter a valid WhatsApp number.');
if ($scrapType === '')                                       $errors[] = tr('Please select the scrap category.');
if (mb_strlen($description) < 10 || mb_strlen($description) > 2000) $errors[] = tr('Please describe the scrap (minimum 10 characters).');
if ($location === '')                                        $errors[] = tr('Please select your city.');
if (mb_strlen($address) < 5 || mb_strlen($address) > 200)    $errors[] = tr('Please enter a valid pickup address.');
if (!valid_date($pickupDate))                                $errors[] = tr('Please enter a valid pickup date.');
if (!valid_time($pickupTime))                                $errors[] = tr('Please enter a valid pickup time.');
if ($estWeight !== '' && mb_strlen($estWeight) > 80)         $errors[] = tr('Estimated weight is too long.');
if (mb_strlen($message) > 2000)                              $errors[] = tr('Message is too long.');

$uploadResult = handle_uploads('photos', 4, 5242880);
if (!$uploadResult['ok']) foreach ($uploadResult['errors'] as $err) $errors[] = $err;

if ($errors) {
    flash_set('error', tr('Please fix the following and resubmit:') . ' ' . implode(' · ', array_slice($errors, 0, 3)));
    redirect('contact-us');
}

$leadId = store_request('pickup', [
    'name'             => $name,
    'phone'            => $phone,
    'whatsapp'         => $whatsapp,
    'scrap_type'       => $scrapType,
    'description'      => $description,
    'estimated_weight' => $estWeight,
    'location'         => $location,
    'address'          => $address,
    'pickup_date'      => $pickupDate,
    'pickup_time'      => $pickupTime,
    'message'          => $message,
    '_files'           => $uploadResult['files'],
]);

$subject = 'New Scrap Pickup Request — ' . site('site_name');
$html = build_lead_html('New Scrap Pickup Request', [
    'Name'             => $name,
    'Phone'            => $phone,
    'WhatsApp'         => $whatsapp !== '' ? $whatsapp : '—',
    'Scrap Category'   => $scrapType,
    'Estimated Weight' => $estWeight !== '' ? $estWeight : '—',
    'City'             => $location,
    'Address'          => $address,
    'Preferred Date'   => $pickupDate !== '' ? $pickupDate : '—',
    'Preferred Time'   => $pickupTime !== '' ? $pickupTime : '—',
    'Description'      => $description,
    'Additional Notes' => $message !== '' ? $message : '—',
], !empty($uploadResult['files']));
send_notification($subject, $html, $uploadResult['files']);

app_log("pickup_request #{$leadId} from {$phone}");
redirect('thank-you');