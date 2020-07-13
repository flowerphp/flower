<?php

use App\Core\router\Route;
use App\Core\View;

$Routes->add(new Route("get","/", function () use ($Session) {
    return View::View("index", [
        "Session" => $Session
    ]);
}));