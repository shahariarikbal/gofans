<?php

return [
    'store_id' => env('AAMARPAY_STORE_ID','aamarpay'),
    'signature_key' => env('AAMARPAY_KEY','28c78bb1f45112f5d40b956fe104645a'),
    'sandbox' => env('AAMARPAY_SANDBOX', true),
    'redirect_url' => [
        'success' => [
            'url' => env('AAMARPAY_SUCCESS_URL','billing/payment-success') // payment.success
        ],
        'cancel' => [
            'url' => env('AAMARPAY_CANCEL_URL','billing/payment-failed') // payment/cancel or you can use route also
        ]
    ]
];
