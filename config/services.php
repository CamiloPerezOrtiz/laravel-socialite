<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
        'client_id' => '2185356418442322',         // Your GitHub Client ID
        'client_secret' => 'ecabc851cbe135246d02f8495ae3dbd9', // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '461924209497-n9c73kk8cqgiudsfp0c60jjrud2rbi3e.apps.googleusercontent.com',         // Your GitHub Client ID
        'client_secret' => '--x0BMl7qvTqNPp5GcrrjllE', // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],

];
