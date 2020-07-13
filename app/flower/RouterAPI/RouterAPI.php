<?php


namespace Flower\RouterAPI;


use AltoRouter;
use Exception;
use Flower\CoreAPI\CoreAPI;

class RouterAPI
{

    private $rootRouter;

    private $CoreAPI;

    /**
     * RouterAPI constructor.
     * @param CoreAPI $coreAPI
     */
    public function __construct(CoreAPI $coreAPI)
    {
        $this->rootRouter = new AltoRouter();
        $this->CoreAPI = $coreAPI;
    }

    /**
     * @return CoreAPI
     */
    public function getCoreAPI(): CoreAPI
    {
        return $this->CoreAPI;
    }

    /**
     * @param string $method
     * @param string $route
     * @param $fn
     * @throws Exception
     */
    public function map(string $method, string $route, $fn)
    {
        $this->rootRouter->map($method, $route, $fn());
    }
}