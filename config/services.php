<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'hitobito' => [
        'base_url' => env('HITOBITO_BASE_URL', 'http://192.168.2.105:3000'),
        'client_id' => env('HITOBITO_CLIENT_UID'),
        'client_secret' => env('HITOBITO_CLIENT_SECRET'),
        #'redirect' => env('HITOBITO_CALLBACK_URI', 'urn:ietf:wg:oauth:2.0:oob'),
        'redirect' => env('HITOBITO_CALLBACK_URI', 'http://192.168.2.105/login/hitobito/callback'),
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

];
