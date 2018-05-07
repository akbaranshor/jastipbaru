<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Credentials
    |--------------------------------------------------------------------------
    |
    | If you're using API credentials, change these settings. Get your
    | credentials from https://dashboard.nexmo.com | 'Settings'.
    |
    */

    /*

      'api_key'    => function_exists('env') ? env('NEXMO_KEY', '7e036986') : 'salah',
    'api_secret' => function_exists('env') ? env('NEXMO_SECRET', '689149264f0e7c18') : 'salah',
    */

    'api_key'    => function_exists('env') ? env('NEXMO_KEY', 'a7eb0af2') : 'salah',
    'api_secret' => function_exists('env') ? env('NEXMO_SECRET', 'bxT7vz2KmQvwp5z2') : 'salah',

    /*
    |--------------------------------------------------------------------------
    | Signature Secret
    |--------------------------------------------------------------------------
    |
    | If you're using a signature secret, use this section. This can be used
    | without an `api_secret` for some APIs, as well as with an `api_secret`
    | for all APIs.
    |
    */

    'signature_secret' => function_exists('env') ? env('NEXMO_SIGNATURE_SECRET', '') : '',

];
