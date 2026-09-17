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
        'short'       => 'We buy all types scrap metal — copper, cable, battery, aluminum & mix scrap.',
        'icon'        => 'fa-box-open',
        'image'       => 'images/metal-scrap.jpg',
        'alt'         => 'Pile of assorted metal scrap ready for weighing and pickup in Dammam',
    ],
    'iron-steel' => [
        'slug'        => 'iron-steel-scrap-buyer-dammam',
        'key'         => 'iron-steel',
        'title'       => 'Iron & Steel',
        'name'        => 'Iron & Steel',
        'short'       => 'Rebar, beams, pipes, sheets and structural iron steel with certified weighing.',
        'icon'        => 'fa-industry',
        'image'       => 'images/iron-steel.jpg',
        'alt'         => 'Stacked iron and steel scrap beams at a buying yard',
    ],
    'copper' => [
        'slug'        => 'copper-scrap-buyer-dammam',
        'key'         => 'copper',
        'title'       => 'Copper',
        'name'        => 'Copper',
        'short'       => 'Bare bright, #1, #2 and insulated copper. The highest-value metal we buy.',
        'icon'        => 'fa-fire-burner',
        'image'       => 'images/scrap/copper.svg',
        'alt'         => 'Copper wire and copper pipe scrap',
    ],
    'aluminum' => [
        'slug'        => 'aluminum-scrap-buyer-dammam',
        'key'         => 'aluminum',
        'title'       => 'Aluminum',
        'name'        => 'Aluminum',
        'short'       => 'Cans, sheets, extrusion, window frames and AC aluminum.',
        'icon'        => 'fa-cubes',
        'image'       => 'images/scrap/aluminum.svg',
        'alt'         => 'Aluminum scrap sheets and profiles',
    ],
    'cable-wire' => [
        'slug'        => 'cable-wire-scrap-buyer-dammam',
        'key'         => 'cable-wire',
        'title'       => 'Old Cable',
        'name'        => 'Old Cable',
        'short'         => 'Old copper cables, aluminum cables, insulated wire and industrial cable drums.',
        'icon'        => 'fa-plug-circle-bolt',
        'image'       => 'images/scrap/cable.svg',
        'alt'         => 'Coils of old cable and wire scrap in Dammam',
    ],
    'ac-appliances' => [
        'slug'        => 'ac-appliance-scrap-buyer-dammam',
        'key'         => 'ac-appliances',
        'title'       => 'AC & Appliances',
        'name'        => 'AC & Appliances',
        'short'       => 'Split and window ACs, refrigerators, washing machines, dryers and compressors.',
        'icon'        => 'fa-snowflake',
        'image'       => 'images/ac-appliances.avif',
        'alt'         => 'Old air-conditioning unit and appliance scrap in Dammam',
    ],
    'industrial' => [
        'slug'        => 'industrial-scrap-buyer-dammam',
        'key'         => 'industrial',
        'title'         => 'Industrial & Factory Scrap',
        'name'          => 'Industrial & Factory',
        'short'         => 'Factory scrap, HMS 1 & 2, production waste, machinery and bulk metals.',
        'icon'        => 'fa-industry-windows',
        'image'       => 'images/industrial-factory.avif',
        'alt'         => 'Factory scrap and industrial metal at an industrial site',
    ],
    'cars' => [
        'slug'        => 'car-scrap-buyer-dammam',
        'key'         => 'cars',
        'title'       => 'Cars & Vehicles',
        'name'        => 'Cars & Vehicles',
        'short'       => 'Junk cars, engines, gearboxes, batteries and vehicle metal with free pickup.',
        'icon'        => 'fa-car-burst',
        'image'       => 'images/cars-vehicles.avif',
        'alt'         => 'Junk vehicle ready for scrap pickup',
    ],
    'construction' => [
        'slug'        => 'construction-demolition-scrap-buyer-dammam',
        'key'         => 'construction',
        'title'       => 'Construction & Demolition',
        'name'        => 'Construction & Demolition',
        'short'       => 'Rebar, structural steel, pipes and demolition scrap for contractors.',
        'icon'        => 'fa-helmet-safety',
        'image'       => 'images/construction-demolition.avif',
        'alt'         => 'Construction and demolition scrap on a building site',
    ],
    'used-battery' => [
        'slug'        => 'used-battery-scrap-buyer-dammam',
        'key'         => 'used-battery',
        'title'       => 'Used Battery',
        'name'        => 'Used Battery',
        'short'       => 'Car, truck, UPS and solar used batteries — safe pickup and instant cash.',
        'icon'        => 'fa-car-battery',
        'image'       => 'images/scrap/wire.svg',
        'alt'         => 'Used car and UPS batteries collected for recycling in Dammam',
    ],
    'stainless-steel' => [
        'slug'        => 'ss-steel-scrap-buyer-dammam',
        'key'         => 'stainless-steel',
        'title'       => 'S.S. Steel',
        'name'        => 'S.S. Steel',
        'short'       => 'Stainless steel sheets, pipes, kitchen equipment and industrial S.S. scrap.',
        'icon'        => 'fa-layer-group',
        'image'       => 'images/scrap/steel.svg',
        'alt'         => 'Stainless steel scrap sheets and pipes in Dammam',
    ],
    'wood' => [
        'slug'        => 'wood-scrap-buyer-dammam',
        'key'         => 'wood',
        'title'       => 'Wood',
        'name'        => 'Wood',
        'short'       => 'Wooden pallets, doors, furniture wood and construction timber waste.',
        'icon'        => 'fa-tree',
        'image'       => 'images/scrap/wood.svg',
        'alt'         => 'Wood scrap pallets and timber collected in Dammam',
    ],
    'mix-scrap' => [
        'slug'        => 'mix-scrap-buyer-dammam',
        'key'         => 'mix-scrap',
        'title'       => 'All Mix Scrap',
        'name'        => 'All Mix Scrap',
        'short'       => 'Any mixed load — metal, cable, battery, wood and steel graded fairly.',
        'icon'        => 'fa-recycle',
        'image'       => 'images/scrap/scrap-yard.svg',
        'alt'         => 'Mixed scrap load sorted and weighed in Dammam',
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