<?php


namespace App\Core;


use App\Core\Databases\DB;
use App\Core\Databases\MySQL;
use App\Core\Promises\CorePromise;
use App\Core\Promises\ExtremeCorePromise;
use GuzzleHttp\Psr7\Request;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class Core
{

    /**
     * @var ExtremeCorePromise
     */
    private $promise;

    private $FileSystem;

    /**
     * @var DB | null
     */
    private $DB = null;

    public function __construct()
    {
        $this->settingPromises();

        if ($this->promise->getConfig()->getPromise()->getDatabases()->getMySQL()->getEnabled())
        {
            $this->DB = new DB(new MySQL($this));
        }
    }

    /**
     * @return Filesystem
     */
    public function getFileSystem() : Filesystem
    {
        return $this->FileSystem;
    }

    /**
     * for this class setting Promises
     */
    private function settingPromises()
    {
        $CorePromise = new CorePromise();
        $CorePromise->setRequest(
            new Request(
                $_SERVER['REQUEST_METHOD'],
                $_SERVER['HTTP_HOST'],
                getallheaders()
            ));

        $CorePromise->setConfig(new Configuration());

        $this->promise = new ExtremeCorePromise($CorePromise);

        $Adapter = new Local($_SERVER['DOCUMENT_ROOT']);
        $FileSystem = new Filesystem($Adapter);

        $this->FileSystem = $FileSystem;

    }


    /**
     * @return DB
     */
    public function getDB()
    {
        return $this->DB;
    }


    /**
     * @return ExtremeCorePromise
     */
    public function getPromise() : ExtremeCorePromise
    {
        return $this->promise;
    }
}