<?php
/**
 * Industrial / B2B request handler.
 */
declare(strict_types=1);
require __DIR__ . '/../includes/bootstrap.php';
require __DIR__ . '/../includes/security.php';
require __DIR__ . '/../includes/storage.php';
require __DIR__ . '/../includes/mailer.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_verify(post('csrf_token'))) {
    flash_set('error', 'Invalid or expired form token. Please try again.');
    redirect('industrial-scrap-buyer-dammam');
}

$rl = rate_limit_allowed('industrial', 4, 900);
if (!$rl['allowed']) {
    flash_set('error', 'Too many requests. Try again in ' . ceil($rl['retry_after'] / 60) . ' minutes.');
    redirect('industrial-scrap-buyer-dammam');
}

if (!honeypot_verified()) redirect('thank-you');

$companyName   = post('company_name');
$contactPerson = post('contact_person');
$phone         = post('phone');
$email         = post('email');
$scrapType     = post('scrap_type');
$quantity      = post('estimated_quantity');
$pickupLoc     = post('pickup_location');
$preferredDate = post('preferred_date');
$message       = post('message');

if (mb_strlen($companyName) < 2 || mb_strlen($companyName) > 150)   $errors[] = 'Please enter the company name.';
if (mb_strlen($contactPerson) < 2 || mb_strlen($contactPerson) > 100) $errors[] = 'Please enter the contact person.';
if (!valid_phone($phone))                                            $errors[] = 'Please enter a valid phone number.';
if ($email !== '' && !valid_email($email))                           $errors[] = 'Please enter a valid email address.';
if ($scrapType === '')                                               $errors[] = 'Please select the scrap type.';
if (mb_strlen($quantity) < 1 || mb_strlen($quantity) > 80)           $errors[] = 'Please give an estimated quantity.';
if ($pickupLoc === '')                                               $errors[] = 'Please select the pickup location.';
if (!valid_date($preferredDate))                                     $errors[] = 'Please enter a valid visit date.';
if (mb_strlen($message) < 10 || mb_strlen($message) > 2000)          $errors[] = 'Please describe the scrap and site details.';

$uploadResult = handle_uploads('photos', 4, 5242880);
if (!$uploadResult['ok']) foreach ($uploadResult['errors'] as $err) $errors[] = $err;

if ($errors) {
    flash_set('error', 'Please fix the following and resubmit: ' . implode(' · ', array_slice($errors, 0, 3)));
    redirect('industrial-scrap-buyer-dammam');
}

$leadId = store_request('industrial', [
    'company_name'        => $companyName,
    'contact_person'      => $contactPerson,
    'phone'               => $phone,
    'email'               => $email,
    'scrap_type'          => $scrapType,
    'estimated_quantity'  => $quantity,
    'pickup_location'     => $pickupLoc,
    'preferred_date'      => $preferredDate,
    'message'             => $message,
    '_files'              => $uploadResult['files'],
]);

$subject = 'New Industrial Request — ' . site('site_name');
$html = build_lead_html('New Industrial / B2B Request', [
    'Company'           => $companyName,
    'Contact Person'    => $contactPerson,
    'Phone'             => $phone,
    'Email'             => $email !== '' ? $email : '—',
    'Scrap Type'        => $scrapType,
    'Estimated Quantity'=> $quantity,
    'Pickup Location'   => $pickupLoc,
    'Preferred Visit'   => $preferredDate !== '' ? $preferredDate : '—',
    'Message'           => $message,
], !empty($uploadResult['files']));
send_notification($subject, $html, $uploadResult['files']);

app_log("industrial_request #{$leadId} from {$companyName}");
redirect('thank-you');