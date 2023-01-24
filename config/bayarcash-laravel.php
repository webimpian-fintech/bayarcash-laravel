<?php

return [
    'route_prefix' => 'bayarcash-payment',

    'middleware' => ['web'],

    'fpx_transaction_url'     => 'https://console.bayar.cash/transactions/add',
    'requery_transaction_url' => 'https://console.bayar.cash/api/transactions?RefNo=',

    'portal_key' => '',

    'bearer_token' => '',

    'payment_gateways' => [
        'fpx'                  => [
            'code'  => 1,
            'label' => 'FPX Online Banking',
        ],
        'manual_bank_transfer' => [
            'code'  => 2,
            'label' => 'Manual Bank Transfer & Cash Deposit Machine',
        ]
    ],
];
