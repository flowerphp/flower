<?php


namespace Flower\CoreAPI;


use App\Core\Core;
use App\Core\Databases\DB;
use App\Core\Promises\ExtremeConfigPromise;

class CoreAPI
{

    private $Core;

    /**
     * CoreAPI constructor.
     * @param Core $core
     */
    public function __construct(Core $core)
    {
        $this->Core = $core;
    }

    /**
     * @return DB
     */
    public function getDataBase() : DB
    {
        return $this->Core->getDB();
    }

    /**
     * @return ExtremeConfigPromise
     */
    public function getConfig() : ExtremeConfigPromise
    {
        return $this->Core->getPromise()->getConfig()->getPromise();
    }

    /**
     * @return Core
     */
    public function getCore(): Core
    {
        return $this->Core;
    }

}