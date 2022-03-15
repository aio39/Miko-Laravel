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

    'google' => [
        'client_id' => array_key_exists('GOOGLE_CLIENT_ID', $_SERVER) ? $_SERVER['GOOGLE_CLIENT_ID'] : env('GOOGLE_CLIENT_ID'),
        'redirect' => array_key_exists('GOOGLE_CLIENT_SECRET', $_SERVER) ? $_SERVER['GOOGLE_CLIENT_SECRET'] : env('GOOGLE_CLIENT_SECRET'),
        'redirect' => array_key_exists('GOOGLE_REDIRECT_URI', $_SERVER) ? $_SERVER['GOOGLE_REDIRECT_URI'] : env('GOOGLE_REDIRECT_URI'),
    ],

    'twitter' => [
        'client_id' => array_key_exists('TWITTER_CLIENT_ID', $_SERVER) ? $_SERVER['TWITTER_CLIENT_ID'] : env('TWITTER_CLIENT_ID'),
        'client_secret' => array_key_exists('TWITTER_CLIENT_SECRET', $_SERVER) ? $_SERVER['TWITTER_CLIENT_SECRET'] : env('TWITTER_CLIENT_SECRET'),
        'redirect' => array_key_exists('TWITTER_REDIRECT_URI', $_SERVER) ? $_SERVER['TWITTER_REDIRECT_URI'] : env('TWITTER_REDIRECT_URI'),
    ],

];
