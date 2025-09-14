<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Di sini Anda dapat mengatur pengaturan untuk cross-origin resource sharing
    | atau "CORS". Ini menentukan operasi lintas-asal apa yang dapat
    | dieksekusi di browser web. Anda bebas menyesuaikan pengaturan ini sesuai kebutuhan.
    |
    | Untuk mempelajari lebih lanjut: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'], // <-- PENGATURAN PENTING: Izinkan semua domain untuk pengembangan.

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];

