<?php

// Require Autoloader by https://getcomposer.org/

use App\Core\Core;
use App\Core\router\Routes;
use App\Core\router\Routingo;
use App\Core\session\Session;

require_once __DIR__ . "/vendor/autoload.php";

$Core = new Core();

$Session = new Session($Core
    ->getPromise()
    ->getConfig()
    ->getPromise()
    ->getApplication()
    ->getName(), $Core);

$Routes = new Routes();

require_once __DIR__ . "/app/routes.php";

$Routingo = new Routingo($Routes, $Core);