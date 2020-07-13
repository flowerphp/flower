<?php


namespace Flower\CoreAPI;


use App\Core\Core;
use App\Core\Databases\DB;
use App\Core\Promises\ExtremeConfigPromise;
use League\Flysystem\Filesystem;

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
     * @return Filesystem
     */
    public function getRootDirectory() : Filesystem
    {
        return $this->Core->getFileSystem();
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