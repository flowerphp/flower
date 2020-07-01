<?php


namespace App\Core\router;


use App\Core\Core;

/**
 * Class Routingo
 * @package App\Core\router
 */
class Routingo
{

    private $routesLinks;
    private $Core;

    public function __construct(Routes $routes, Core $core)
    {
        $this->routesLinks = $this->addAllRoutes($routes);
        $this->Core = $core;

        $this->run();
    }

    /**
     * @return Core
     */
    public function getCore(): Core
    {
        return $this->Core;
    }

    private function addAllRoutes(Routes $routes) : array
    {
        return array_unique($routes->getRoutes(), SORT_LOCALE_STRING);
    }

    private function run()
    {
        var_dump($this->ResponseBroadcastWithRoutes());
    }

    /**
     * @return mixed
     */
    private function ResponseBroadcastWithRoutes()
    {

        return array_search($_SERVER['REQUEST_METHOD'], $this->getRoutesLinks()) + array_search($_SERVER['REQUEST_URI'], $this->getRoutesLinks());
    }

    /**
     * @return array
     */
    public function getRoutesLinks() : array
    {
        return $this->routesLinks;
    }
}