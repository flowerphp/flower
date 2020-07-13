<?php

use App\Core\View;

$Environ->getRouter()->map("GET", "/", function () {
    print View::View("index");
});