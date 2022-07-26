<?php

return [

    'defaults' => [
        'guard' => 'user',
        'passwords' => 'user',
    ],

    'guards' => [
        'user' => [
            'driver' => 'session',
            'provider' => 'user',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin',
        ],
    ],

    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admin' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'user' => [
            'provider' => 'user',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ], 'throttle' => 60,
        'admin' => [
            'provider' => 'admin',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ], 'throttle' => 60,
    ],

    'password_timeout' => 10800,
];
