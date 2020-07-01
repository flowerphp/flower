<?php


namespace App\Core\router;


class Routes
{
    private $routes;

    public function add(Route $route)
    {
        $this->routes[] = $route;
    }

    /**
     * @return array
     */
    public function getRoutes() : array
    {
        return $this->routes;
    }
}