<?php


namespace Flower\RouterAPI;


use Flower\CoreAPI\CoreAPI;
use Klein\Klein;

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
        $this->rootRouter = new Klein();
        $this->CoreAPI = $coreAPI;
    }

    /**
     * @return Klein
     */
    public function getRootRouter(): Klein
    {
        return $this->rootRouter;
    }

    /**
     * @return CoreAPI
     */
    public function getCoreAPI(): CoreAPI
    {
        return $this->CoreAPI;
    }

}