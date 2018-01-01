<?php

return array(

    'simmatrix-ios-production' => [
        'environment' => 'production',
        'certificate' => env('PUSH_NOTIFICATION_IOS_CERT_PRODUCTION'),
        'passPhrase'  => env('PUSH_NOTIFICATION_IOS_CERT_PASSPHRASE_PRODUCTION'),
        'service'     => 'apns'
    ],

    'simmatrix-android-production' => [
        'environment' => 'production',
        'apiKey'      => env('PUSH_NOTIFICATION_GCM_API_KEY_PRODUCTION'),
        'service'     => 'gcm'
    ],

    'simmatrix-ios-development' => [
        'environment' => 'development',
        'certificate' => env('PUSH_NOTIFICATION_IOS_CERT_DEVELOPMENT'),
        'passPhrase'  => env('PUSH_NOTIFICATION_IOS_CERT_PASSPHRASE_DEVELOPMENT'),
        'service'     => 'apns'
    ],

    'simmatrix-android-development' => [
        'environment' => 'development',
        'apiKey'      => env('PUSH_NOTIFICATION_GCM_API_KEY_DEVELOPMENT'),
        'service'     => 'gcm'
    ],

);