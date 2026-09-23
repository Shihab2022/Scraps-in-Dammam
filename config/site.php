<?php
/**
 * Central site configuration.
 * All business information across the website is read from this file,
 * so nothing is hardcoded in templates or components.
 */
return [
    'site_name'   => 'Scraps Buyer in Saudi Arabia',
    'company'     => 'Gulf Scrap Trading Est.',
    'tagline'     => 'We Buy All Types of Scrap Metal in Mecca, Jeddah & Taif, Saudi Arabia',

    'phone'       => '+966 57 035 2909',
    'phone_tel'   => '+966570352909',
    'whatsapp'    => '966570352909',          // WhatsApp: +966 57 035 2909
    'email'       => 'atozscrapbuyersa@gmail.com',
    'address'     => 'Mecca, Jeddah & Taif, Saudi Arabia',
    'city'        => 'Mecca',
    'country'     => 'Saudi Arabia',
    'currency'    => 'SAR',
    'language'    => 'en',

    'service_area' => 'Mecca, Jeddah & Taif, Saudi Arabia',

    'service_areas' => [
        'Mecca',
        'Jeddah',
        'Taif',
    ],

    /* Main yard coordinates — used for LocalBusiness schema + geo meta tags. */
    'geo' => ['lat' => 21.4225, 'lng' => 39.8262],

    'locations' => [
        'mecca' => [
            'name'  => 'Mecca',
            'slug'  => 'scrap-buyer-mecca',
            'city'  => 'Mecca, Saudi Arabia',
            'geo'   => ['lat' => 21.4225, 'lng' => 39.8262],
            'embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14871.086561603104!2d39.8101212!3d21.4224874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c21b4bec8a167b%3A0xe6148a35d5c5b4d1!2sMecca%20Saudi%20Arabia!5e0!3m2!1sen!2ssa!4v1690000000000!5m2!1sen!2ssa',
        ],
        'jeddah' => [
            'name'  => 'Jeddah',
            'slug'  => 'scrap-buyer-jeddah',
            'city'  => 'Jeddah, Saudi Arabia',
            'geo'   => ['lat' => 21.5433, 'lng' => 39.1728],
            'embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d951957.5737348373!2d38.4912472!3d21.5434665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d48fb611bea7%3A0xe306162773f1397e!2sJeddah%20Saudi%20Arabia!5e0!3m2!1sen!2ssa!4v1690000000000!5m2!1sen!2ssa',
        ],
        'taif' => [
            'name'  => 'Taif',
            'slug'  => 'scrap-buyer-taif',
            'city'  => 'Taif, Saudi Arabia',
            'geo'   => ['lat' => 21.2854, 'lng' => 40.4183],
            'embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d92725.84897531588!2d40.3651058!3d21.2854663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15bb8b3ea94c3b2d%3A0x7f1e0c1bbbcbb3d3!2sTaif%20Saudi%20Arabia!5e0!3m2!1sen!2ssa!4v1690000000000!5m2!1sen!2ssa',
        ],
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
        'linkedin'  => 'https://www.linkedin.com/in/scrap-buyer-in-dammam-787970290/',
    ],

    'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14871.086561603104!2d39.8101212!3d21.4224874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c21b4bec8a167b%3A0xe6148a35d5c5b4d1!2sMecca%20Saudi%20Arabia!5e0!3m2!1sen!2ssa!4v1690000000000!5m2!1sen!2ssa',

    'hero' => [
        'eyebrow'   => 'Scrap Buyer in Mecca, Jeddah & Taif',
        'heading'   => 'We Buy All Types of Scrap Metal &amp; Pay Instantly',
        'subtext'   => 'We Buy All Types of Scrap Metal — Copper, Old Cable, Used Battery, Aluminum, Iron Steel, Wood, S.S. Steel & All Mix Scrap in Mecca, Jeddah & Taif of Saudi Arabia. Free pickup, certified weighing and instant payment.',
        'primary_cta'   => 'WhatsApp Us',
        'primary_url'   => 'whatsapp', // special value -> built from whatsapp number
        'secondary_cta' => 'Call Now',
        'secondary_url' => 'tel',
    ],

    'badges' => [
        ['icon' => 'fa-truck-fast',      'title' => 'Free Pickup',       'text' => 'Doorstep collection in Mecca, Jeddah & Taif.'],
        ['icon' => 'fa-scale-balanced',  'title' => 'Fair Price',        'text' => 'Transparent market-based rates confirmed up front.'],
        ['icon' => 'fa-money-bill-wave', 'title' => 'Instant Payment',   'text' => 'Cash or bank transfer right after weighing.'],
    ],

    /* -------------------- SEO defaults (header + sitemap) -------------------- */
    'seo' => [
        // Default Open Graph / Twitter image. Must be a raster format
        // (jpg, png, webp or gif) — link previewers cannot render SVG or AVIF.
        'default_og_image' => 'images/about-us.png',
        'og_image_width'   => 1672,
        'og_image_height'  => 941,
        'twitter_site'     => '',            // e.g. '@yourbrand' — leave empty to omit
        'theme_color'      => '#16181d',
        'max_title_length' => 65,            // brand suffix is dropped when a title would exceed this
    ],

    'admin_email' => 'atozscrapbuyersa@gmail.com',
];