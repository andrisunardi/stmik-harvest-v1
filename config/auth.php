<?php

return [

    'defaults' => [
        'guard' => 'admin',
        'passwords' => 'admin',
    ],

    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin',
        ],
    ],

    'providers' => [
        'admin' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'admin' => [
            'provider' => 'admin',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ], 'throttle' => 60,
    ],

    'password_timeout' => 10800,
];
