<?php

return [
    'tagline' => env('COMPANY_TAGLINE', 'Industri Kayu & Produk Turunan'),
    'address' => env('COMPANY_ADDRESS', 'Alamat perusahaan belum diatur'),
    'phone' => env('COMPANY_PHONE', ''),
    'email' => env('COMPANY_EMAIL', ''),
    'website' => env('COMPANY_WEBSITE', parse_url(env('APP_URL', ''), PHP_URL_HOST) ?: env('APP_URL', '')),
];
