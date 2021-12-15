<?php
/**
 * Yii Application Config
 *
 * Edit this file at your own risk!
 *
 * The array returned by this file will get merged with
 * vendor/craftcms/cms/src/config/app.php and app.[web|console].php, when
 * Craft's bootstrap script is defining the configuration for the entire
 * application.
 *
 * You can define custom modules and system components, and even override the
 * built-in system components.
 *
 * If you want to modify the application config for *only* web requests or
 * *only* console requests, create an app.web.php or app.console.php file in
 * your config/ folder, alongside this one.
 */

use craft\behaviors\SessionBehavior;
use craft\helpers\App;
use modules\Module;
use yii\redis\Session;

return [
    // All environments
    '*' => [
        'modules' => [
            'my-module' => Module::class,
        ],
        //'bootstrap' => ['my-module'],
    ],
    // Live (production) environment
    'production'  => [
        'components' => [
            // Default to database 0, so PHP sessions are in a separate database
            'redis' => [
                'class' => yii\redis\Connection::class,
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => 0,
            ],
            'cache' => [
                // Use database 1 for live production
                'class' => yii\redis\Cache::class,
                'redis' => [
                    'hostname' => 'localhost',
                    'port' => 6379,
                    'database' => 1,
                ],
            ],
            'session' => [
                'class' => Session::class,
                'as session' => [
                    'class' => SessionBehavior::class,
                ],
            ],
        ],
    ],
    // Staging (pre-production) environment
    'staging'  => [
        // Default to database 0, so PHP sessions are in a separate database
        'components' => [
            'redis' => [
                'class' => yii\redis\Connection::class,
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => 0,
            ],
            // Use database 2 for staging
            'cache' => [
                'class' => yii\redis\Cache::class,
                'redis' => [
                    'hostname' => 'localhost',
                    'port' => 6379,
                    'database' => 2,
                ],
            ],
            'session' => [
                'class' => Session::class,
                'as session' => [
                    'class' => SessionBehavior::class,
                ],
            ],
        ],
    ],
    // Local (development) environment
    'dev'  => [
        'components' => [
            // Default to database 0, so PHP sessions are in a separate database
            'redis' => [
                'class' => yii\redis\Connection::class,
                'hostname' => App::env('LOCAL_REDIS_HOSTNAME'),
                'port' => App::env('LOCAL_REDIS_PORT'),
                'database' => 0,
            ],
            'cache' => [
                'class' => yii\redis\Cache::class,
                'keyPrefix' => App::env('APP_ID') ?: 'CraftCMS',
                'redis' => [
                    'hostname' => App::env('LOCAL_REDIS_HOSTNAME'),
                    'port' => App::env('LOCAL_REDIS_PORT'),
                    'database' => 1,
                ],
            ],
            'session' => [
                'class' => Session::class,
                'as session' => [
                    'class' => SessionBehavior::class,
                ],
            ],
        ],
    ],
];
