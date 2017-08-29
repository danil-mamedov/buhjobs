<?php

use Phalcon\Mvc\Application;

error_reporting(E_ALL);

try {
    $appsConfig = __DIR__ . "../apps/config/config.php";
    require __DIR__ . "/../apps/config/services.php";
    $application = new Application();
    $application->setDI($di);
    require __DIR__ . "/../apps/config/modules.php";
    $response = $application->handle();
    echo $response->getContent();
} catch (Exception $e) {
    echo $e->getMessage();
}
