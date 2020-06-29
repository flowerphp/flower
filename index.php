<?php

// Require Autoloader by https://getcomposer.org/

use App\Core\Core;
use App\Core\Router\Router;

require_once __DIR__ . "/vendor/autoload.php";

$Core = new Core();

$Router = new Router();