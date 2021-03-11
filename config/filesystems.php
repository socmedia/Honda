<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
     */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
     */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'productThumbnail' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/products/thumbnail'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'productBanner' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/products/banner'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'productFeature' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/products/feature'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'productVarian' => [
            'driver' => 'local',
            'root' => storage_path('app/publicimages/products/varian'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'productBrochure' => [
            'driver' => 'local',
            'root' => storage_path('app/public/files/products/brochure'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'genuine_parts' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/honda/genuine_parts'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'apparels' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/honda/apparels'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'accessories' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/honda/accessories'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'articles' => [
            'driver' => 'local',
            'root' => storage_path('app/public/articles'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        'promo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/promo'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
     */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];