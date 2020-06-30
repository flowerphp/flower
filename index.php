<?php

// Require Autoloader by https://getcomposer.org/

use App\Core\Core;
use App\Core\Router\Router;

require_once __DIR__ . "/vendor/autoload.php";

$Core = new Core();

$Router = new Router($Core);

$Router->get("/a", function () {
    return "a";
});
$Router->get("/a", function () {
    return "a";
});
$Router->get("/a", function () {
    return "a";
});

print "<pre>";
var_dump($Router->getRoutes()->_getAll());
print "</pre>";