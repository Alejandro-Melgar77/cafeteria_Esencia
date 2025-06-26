<?php

return [
    'mode' => env('PAYPAL_MODE', 'sandbox'),
    'currency' => env('PAYPAL_CURRENCY', 'USD'),
    'return_url' => env('PAYPAL_RETURN_URL', '/paypal/success'),
    'cancel_url' => env('PAYPAL_CANCEL_URL', '/paypal/cancel'),
    
    'sandbox' => [
        'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
        'client_secret' => env('PAYPAL_SANDBOX_SECRET'),
    ],
    'live' => [
        'client_id' => env('PAYPAL_LIVE_CLIENT_ID'),
        'client_secret' => env('PAYPAL_LIVE_SECRET'),
    ]
];