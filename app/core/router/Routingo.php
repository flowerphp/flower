<?php


namespace App\Core\router;


use App\Core\Core;
use Closure;

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
    public function getCore() : Core
    {
        return $this->Core;
    }

    private function addAllRoutes(Routes $routes) : array
    {
        return array_unique($routes->getRoutes(), SORT_LOCALE_STRING);
    }

    /**
     * @return void
     */
    private function run() : void
    {
        $response  = $this->responseBroadcastWithRoutes();

        if (is_string($response))
        {
            print $response;
        } else {
            ($response)();
        }
    }

    /**
     * @return mixed
     */
    private function responseBroadcastWithRoutes()
    {
        foreach ($this->getRoutesLinks() as $value)
        {
            if ($_SERVER['REQUEST_URI'] === $value->getPath() && strtoupper($_SERVER['REQUEST_METHOD']) === strtoupper($value->getMethod()))
            {
                return $value->getFn();
            }
        }

        return $this->errorsDetecting([
            "404" => "a",
            "500" => "a"
        ]);
    }
    
    /**
     * @param array $code
     * @return Closure
     */
    private function errorsDetecting(array $code)
    {
        $last_error = error_get_last();

        if ($last_error && $last_error['type'] == E_ERROR)
        {
            return function () use ($code) {
                return $this->setCodeErrorFunc((int)$code, [
                    "500" => function () use ($code) {

                        // Error 500
                        header("HTTP/1.1 500 Internal Server Error");
                        return $code["500"];

                    }
                ]);
            };
        }

        return function () use ($code) {
            return $this->setCodeErrorFunc((int)$code, [
                "404" => function () use ($code) {

                    // Error 404
                    header("HTTP/1.0 404 Not Found");
                    return $code["404"];

                }
            ]);
        };
    }

    /**
     * @param int $code
     * @param array $errors
     * @return mixed
     */
    private function setCodeErrorFunc(int $code, array $errors)
    {
        switch ($code)
        {
            case "404":
                return ($errors["404"])();
            case "500":
                return ($errors["500"])();
        }
        return 400;
    }

    /**
     * @return array
     */
    public function getRoutesLinks() : array
    {
        return $this->routesLinks;
    }
}