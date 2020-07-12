<?php

// Require Autoloader by https://getcomposer.org/

use App\Core\Core;
use App\Core\router\Route;
use App\Core\router\Routes;
use App\Core\router\Routingo;
use App\Core\session\Session;
use App\Core\View;

require_once __DIR__ . "/vendor/autoload.php";

$Core = new Core();

$Session = new Session($Core
    ->getPromise()
    ->getConfig()
    ->getPromise()
    ->getApplication()
    ->getName(), $Core);

$Routes = new Routes();

$Routes->add(new Route("get","/", function () use ($Session) {
    return View::View("index", [
        "Session" => $Session
    ]);
}));

$Routingo = new Routingo($Routes, $Core);