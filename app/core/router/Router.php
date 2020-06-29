<?php


namespace App\Core\Router;


class Router
{

    private $routesCollection;

    public function __construct()
    {
        $this->routesCollection = new RoutesCollection();
    }
}