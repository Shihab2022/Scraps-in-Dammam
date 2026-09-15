<?php
/**
 * Central site configuration.
 * All business information across the website is read from this file,
 * so nothing is hardcoded in templates or components.
 */
return [
    'site_name'   => 'Gulf Scrap Buyer',
    'company'     => 'Gulf Scrap Trading Est.',
    'tagline'     => 'Scrap metal buying & pickup across Dammam and the Eastern Province',

    'phone'       => '+966 13 800 1500',
    'phone_tel'   => '+966138001500',
    'whatsapp'    => '966138001500',          // international format, digits only
    'email'       => 'info@gulfscrapbuyer.com',
    'address'     => 'Industrial Area 2, Dammam, Eastern Province, Saudi Arabia',
    'city'        => 'Dammam',
    'country'     => 'Saudi Arabia',
    'currency'    => 'SAR',
    'language'    => 'en',

    'service_area' => 'Dammam and the Eastern Province',

    'service_areas' => [
        'Dammam',
        'Khobar',
        'Dhahran',
        'Qatif',
        'Jubail',
        'Al-Ahsa',
    ],

    'business_hours' => [
        'Saturday' => '8:00 AM – 8:00 PM',
        'Sunday'   => '8:00 AM – 8:00 PM',
        'Monday'   => '8:00 AM – 8:00 PM',
        'Tuesday'  => '8:00 AM – 8:00 PM',
        'Wednesday'=> '8:00 AM – 8:00 PM',
        'Thursday' => '8:00 AM – 8:00 PM',
        'Friday'   => '2:00 PM – 8:00 PM',
    ],
    'hours_short' => 'Sat–Thu 8 AM – 8 PM · Fri 2 PM – 8 PM',

    'stats' => [
        'years_experience' => 10,
        'customer_count'   => '500+',
        'pickup_time'      => 'Same-Day',
        'weighing'         => 'Certified',
    ],

    'social' => [
        'facebook'  => 'https://facebook.com/gulfscrapbuyer',
        'instagram' => 'https://instagram.com/gulfscrapbuyer',
        'twitter'   => 'https://twitter.com/gulfscrapbuyer',
        'linkedin'  => 'https://linkedin.com/company/gulfscrapbuyer',
    ],

    'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57109.94356739492!2d50.05833109248621!3d26.420779032205943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49fa2552e5c0bb%3A0x59ed3e9c6be20333!2sDammam%20Saudi%20Arabia!5e0!3m2!1sen!2ssa!4v1690000000000!5m2!1sen!2ssa',

    'hero' => [
        'eyebrow'   => 'Trusted Scrap Buyer in Dammam',
        'heading'   => 'Sell Your Scrap &amp; Get Paid Instantly',
        'subtext'   => 'Free pickup, certified weighing, fair pricing, and fast payment for scrap metal, copper, aluminum, cables, AC units, vehicles, and industrial scrap.',
        'primary_cta'   => 'WhatsApp Us',
        'primary_url'   => 'whatsapp', // special value -> built from whatsapp number
        'secondary_cta' => 'Call Now',
        'secondary_url' => 'tel',
    ],

    'badges' => [
        ['icon' => 'fa-truck-fast',      'title' => 'Free Pickup',       'text' => 'Doorstep collection across the Eastern Province.'],
        ['icon' => 'fa-scale-balanced',  'title' => 'Fair Price',        'text' => 'Transparent market-based rates confirmed up front.'],
        ['icon' => 'fa-money-bill-wave', 'title' => 'Instant Payment',   'text' => 'Cash or bank transfer right after weighing.'],
    ],

    'admin_email' => 'info@gulfscrapbuyer.com',
];