<?php
/**
 * Email configuration.
 *
 * driver options:
 *  - 'log'   : default — write the email to uploads/logs/mail.log (always works in dev).
 *  - 'mail'  : PHP mail() function (needs a configured sendmail/MTA on the server).
 *  - 'smtp'  : PHPMailer + SMTP. Requires PHPMailer to be installed
 *              (composer require phpmailer/phpmailer) and MAIL_* env vars set.
 */
return [
    'driver'   => env('MAIL_DRIVER', 'log'),
    'host'     => env('MAIL_HOST', 'smtp.example.com'),
    'port'     => env('MAIL_PORT', '587'),
    'username' => env('MAIL_USERNAME', ''),
    'password' => env('MAIL_PASSWORD', ''),
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'from_email' => env('MAIL_FROM_EMAIL', env('ADMIN_EMAIL', 'scrapbuyerindammam@gmail.com')),
    'from_name'  => env('MAIL_FROM_NAME', 'Gulf Scrap Buyer'),
    'to_email'   => env('ADMIN_EMAIL', 'scrapbuyerindammam@gmail.com'),
];