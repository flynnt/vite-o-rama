<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\helpers\App;

return [
    // Global settings
    '*' => [
        // Default Week Start Day (0 = Sunday, 1 = Monday...)
        'defaultWeekStartDay' => 1,

        // Whether generated URLs should omit "index.php"
        'omitScriptNameInUrls' => true,

        // Enable CSRF Protection (recommended)
        'enableCsrfProtection' => true,

        // Dont allow more than 25 revisions otherwise DB gets huge
        'maxRevisions' => 25,

        // Control Panel trigger word
        'cpTrigger' => 'admin',

        // The secure key Craft will use for hashing and encrypting data
        'securityKey' => App::env('SECURITY_KEY'),

        // Don't allow admin changes by default
        'allowAdminChanges' => false,

        // Disable system and plugin updates in the Control Panel
        'allowUpdates' => false,

        'aliases' => [
            '@webroot' => dirname(__DIR__) . App::env('APP_WEBROOT'),
        ],

        'enableTemplateCaching' => false,
    ],

    // Dev environment settings
    'dev' => [
        // Dev Mode (see https://craftcms.com/guides/what-dev-mode-does)
        'devMode' => true,

        // Only allow admin changes in dev so project config doesn't get out of sync
        'allowAdminChanges' => true,
    ],

    // Staging environment settings
    'staging' => [
    ],

    // Production environment settings
    'production' => [
    ],
];
