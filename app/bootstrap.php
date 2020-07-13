<?php

use Flower\Environ;
use Flower\RouterAPI\RoutePublicFiles;

// Require Autoloader by https://getcomposer.org/
require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

$Environ = new Environ();

try {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/routes.php";
    RoutePublicFiles::setRoutes($Environ);
} catch (Exception $e) {

}

$Environ->getRouter()->getRootRouter()->dispatch();