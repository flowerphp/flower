<?php

// Require Autoloader by https://getcomposer.org/

use App\Core\Core;
use GuzzleHttp\Psr7\Request;

require_once __DIR__ . "/vendor/autoload.php";

$Core = new Core(
    new Request(
        $_SERVER['REQUEST_METHOD'],
        $_SERVER['HTTP_HOST'],
        getallheaders()
    )
);
