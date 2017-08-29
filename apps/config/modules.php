<?php

use Multiple\Frontend\Module       as FrontendModule;
use Multiple\Administration\Module as AdministrationModule;

/**
 * Register application modules
 */
$application->registerModules(
    [
        "frontend" => [
            "className" => FrontendModule::class,
            "path"      => __DIR__ . "/../modules/frontend/Module.php",
        ],
        "administration" => [
            "className" => AdministrationModule::class,
            "path"      => __DIR__ . "/../modules/administration/Module.php",
        ],
    ]
);
