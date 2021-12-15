<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Config
    |--------------------------------------------------------------------------
    */

    'topics_order' => env('FRONTEND_TOPICS_ORDER', 'desc'),
    'date_format' => env("DATE_FORMAT", "d/m/Y"),
    'backend_pagination' => env('BACKEND_PAGINATION', 20),
    'frontend_pagination' => env('FRONTEND_PAGINATION', 6),

    /*
    |--------------------------------------------------------------------------
    | Application Store
    |--------------------------------------------------------------------------
    */

    'last_version' => '1.0.5',
    'play_store' => 'https://play.google.com/store/apps/details?id=com.r2company.eigrejas',
    'apple_store' => 'https://apps.apple.com/br/app/e-igrejas/id1581096923',

];