<?php

namespace App\Core\Router;



interface iRouter
{

    public function get(string $path, $fn);
    public function post(string $path, $fn);
    public function patch(string $path, $fn);
    public function delete(string $path, $fn);
    public function head(string $path, $fn);

    public function respond(string $method, string $path, $fn);

    public function getRoutes() : RoutesCollection;
}