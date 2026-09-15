<?php
/**
 * Scrap category registry — single source of truth for all
 * category metadata used by the navbar, footer, homepage cards and pages.
 */
declare(strict_types=1);

$scrapCategories = [
    'metal' => [
        'slug'        => 'metal-scrap-buyer-dammam',
        'key'         => 'metal',
        'title'       => 'Metal Scrap',
        'name'        => 'Metal Scrap',
        'short'       => 'We buy all kinds of metal scrap — iron, steel, copper, aluminum, brass and stainless steel.',
        'icon'        => 'fa-box-open',
        'image'       => 'assets/images/scrap/metal.svg',
        'alt'         => 'Pile of assorted metal scrap ready for weighing and pickup',
    ],
    'iron-steel' => [
        'slug'        => 'iron-steel-scrap-buyer-dammam',
        'key'         => 'iron-steel',
        'title'       => 'Iron & Steel',
        'name'        => 'Iron & Steel',
        'short'       => 'Rebar, beams, pipes, sheets and structural steel purchased with certified weighing.',
        'icon'        => 'fa-industry',
        'image'       => 'assets/images/scrap/iron-steel.svg',
        'alt'         => 'Stacked iron and steel scrap beams at a buying yard',
    ],
    'copper' => [
        'slug'        => 'copper-scrap-buyer-dammam',
        'key'         => 'copper',
        'title'       => 'Copper',
        'name'        => 'Copper',
        'short'       => 'Bare bright, #1, #2 and insulated copper. The highest-value metal we buy.',
        'icon'        => 'fa-fire-burner',
        'image'       => 'assets/images/scrap/copper.svg',
        'alt'         => 'Copper wire and copper pipe scrap',
    ],
    'aluminum' => [
        'slug'        => 'aluminum-scrap-buyer-dammam',
        'key'         => 'aluminum',
        'title'       => 'Aluminum',
        'name'        => 'Aluminum',
        'short'       => 'Cans, sheets, extrusion, window frames and AC aluminum.',
        'icon'        => 'fa-cubes',
        'image'       => 'assets/images/scrap/aluminum.svg',
        'alt'         => 'Aluminum scrap sheets and profiles',
    ],
    'cable-wire' => [
        'slug'        => 'cable-wire-scrap-buyer-dammam',
        'key'         => 'cable-wire',
        'title'       => 'Cable & Wire',
        'name'        => 'Cable & Wire',
        'short'         => 'Copper cables, aluminum cables, insulated wire and industrial cable drums.',
        'icon'        => 'fa-plug-circle-bolt',
        'image'       => 'assets/images/scrap/cable.svg',
        'alt'         => 'Coils of scrap cable and wire',
    ],
    'ac-appliances' => [
        'slug'        => 'ac-appliance-scrap-buyer-dammam',
        'key'         => 'ac-appliances',
        'title'       => 'AC & Appliances',
        'name'        => 'AC & Appliances',
        'short'       => 'Split and window ACs, refrigerators, washing machines, dryers and compressors.',
        'icon'        => 'fa-snowflake',
        'image'       => 'assets/images/scrap/ac.svg',
        'alt'         => 'Old air-conditioning unit and appliance scrap',
    ],
    'industrial' => [
        'slug'        => 'industrial-scrap-buyer-dammam',
        'key'         => 'industrial',
        'title'         => 'Industrial & Factory Scrap',
        'name'          => 'Industrial & Factory',
        'short'         => 'Factory scrap, HMS 1 & 2, production waste, machinery and bulk industrial metals.',
        'icon'        => 'fa-industry-windows',
        'image'       => 'assets/images/scrap/industrial.svg',
        'alt'         => 'Factory scrap and industrial metal at an industrial site',
    ],
    'cars' => [
        'slug'        => 'car-scrap-buyer-dammam',
        'key'         => 'cars',
        'title'       => 'Cars & Vehicles',
        'name'        => 'Cars & Vehicles',
        'short'       => 'Junk cars, engines, gearboxes, batteries and vehicle metal with free pickup.',
        'icon'        => 'fa-car-burst',
        'image'       => 'assets/images/scrap/car.svg',
        'alt'         => 'Junk vehicle ready for scrap pickup',
    ],
    'construction' => [
        'slug'        => 'construction-demolition-scrap-buyer-dammam',
        'key'         => 'construction',
        'title'       => 'Construction & Demolition',
        'name'        => 'Construction & Demolition',
        'short'       => 'Rebar, structural steel, pipes and demolition scrap for contractors and builders.',
        'icon'        => 'fa-helmet-safety',
        'image'       => 'assets/images/scrap/construction.svg',
        'alt'         => 'Construction and demolition scrap on a building site',
    ],
];

if (!function_exists('scrap_category')) {
    function scrap_category(string $key): ?array
    {
        global $scrapCategories;
        return $scrapCategories[$key] ?? null;
    }
}

/** Return the active scrap category key for the current URL. */
if (!function_exists('current_scrap_key')) {
    function current_scrap_key(): ?string
    {
        $route = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
        foreach ($GLOBALS['scrapCategories'] as $cat) {
            if ($route === $cat['slug']) return $cat['key'];
        }
        return null;
    }
}