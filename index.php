<?php

// Require Autoloader by https://getcomposer.org/

use App\Core\Core;
use App\Core\router\Route;
use App\Core\router\Routes;
use App\Core\router\Routingo;

require_once __DIR__ . "/vendor/autoload.php";

$Core = new Core();

$Routes = new Routes();

$Routes->add(new Route("get","/",function () {
    return "text";
}));

$Routes->add(new Route("get","/mat",function () {
    return "text";
}));

$Routingo = new Routingo($Routes, $Core);