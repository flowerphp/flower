<?php

use App\Core\View;

$Environ->getRouter()->getRootRouter()->get("/", function () {
    print View::View('index');
});
