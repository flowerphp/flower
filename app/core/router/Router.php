<?php


namespace App\Core\Router;


use App\Core\Core;
use App\Core\promises\ResponsePromise;

/**
 * Class Router
 * @package App\Core\Router
 * @deprecated
 */
class Router implements iRouter
{

    private $routesCollection;
    private $core;

    public function __construct(Core $core)
    {
        $this->routesCollection = new RoutesCollection();
        $this->core = $core;
    }

    /**
     * @param string $path
     * @param $fn
     */
    public function get(string $path, $fn)
    {
        $this->routesCollection->_add([
            "path" => $path,
            "method" => "GET",
            "function" => $fn
        ]);
    }

    /**
     * @param string $path
     * @param $fn
     */
    public function post(string $path, $fn)
    {
        $this->routesCollection->_add([
            "path" => $path,
            "method" => "POST",
            "function" => $fn
        ]);
    }

    /**
     * @param string $path
     * @param $fn
     */
    public function patch(string $path, $fn)
    {
        $this->routesCollection->_add([
            "path" => $path,
            "method" => "PATCH",
            "function" => $fn
        ]);
    }

    /**
     * @param string $path
     * @param $fn
     */
    public function delete(string $path, $fn)
    {
        $this->routesCollection->_add([
            "path" => $path,
            "method" => "DELETE",
            "function" => $fn
        ]);
    }

    /**
     * @param string $path
     * @param $fn
     */
    public function head(string $path, $fn)
    {
        $this->routesCollection->_add([
            "path" => $path,
            "method" => "HEAD",
            "function" => $fn
        ]);
    }

    /**
     * @param string $method
     * @param string $path
     * @param $fn
     */
    public function respond(string $method, string $path, $fn)
    {
        $this->routesCollection->_add([
            "path" => $path,
            "method" => strtoupper($method),
            "function" => $fn
        ]);
    }

    /**
     * @return RoutesCollection
     */
    public function getRoutes(): RoutesCollection
    {
        return $this->routesCollection;
    }

    /**
     * @param string $path
     * @param ResponsePromise $responsePromise
     * @param $fn
     * @return mixed
     */
    private function isPathEqual(string $path, ResponsePromise $responsePromise, $fn)
    {
        if ($responsePromise->getUri() === $path)
        {
            return $fn($responsePromise, $path);
        }
        return false;
    }

    /**
     * @param string $path
     * @param ResponsePromise $responsePromise
     * @param $fn
     * @return bool|mixed
     */
    private function handleResponse(string $path, ResponsePromise $responsePromise, $fn)
    {


        if ($this->testUri($responsePromise, "/"))
            return $this->isPathEqual($path, $responsePromise, $fn);

        if ($this->testUri($responsePromise, "\\"))
            return $this->isPathEqual($path, $responsePromise, $fn);

        return false;
    }

    /**
     * @param ResponsePromise $responsePromise
     * @param string $delimiter
     * @return bool
     */
    private function testUri(ResponsePromise $responsePromise, string $delimiter)
    {
        if (!$this->testDefaultUri($responsePromise))
        {
            $test = explode($delimiter,$responsePromise->getUri());
            if (count($test) === 0) return false; else return true;
        }
        return false;
    }

    /**
     * @param ResponsePromise $responsePromise
     * @return boolean
     */
    private function testDefaultUri(ResponsePromise $responsePromise)
    {
        if ($responsePromise->getUri() === "/") return true; else return false;
    }

    private function getResponse() : ResponsePromise
    {
        return new ResponsePromise(
            trim($this->core->getPromise()->getRequest()->getMethod()),
            trim($_SERVER['REQUEST_URI']),
            trim($_SERVER['REQUEST_TIME'])
        );
    }
}
