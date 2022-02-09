<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'facebook' => [
        'client_id' => '741909050547398',
        'client_secret' => '5e6e895c15e6b3729696c52270370bb2',
        'redirect' => env('APP_URL'). 'auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '551989845804-gcvbr6od16mq5ka3a4262ob6ne7dd99n.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' =>  env('APP_URL').'auth/google/callback',
    ],
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

];
