<?php

use Flower\Environ;

// Require Autoloader by https://getcomposer.org/
require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

$Environ = new Environ();

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/routes.php";

try {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/app/routes.php";
} catch (Exception $e) {

}