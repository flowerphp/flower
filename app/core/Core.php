<?php


namespace App\Core;


use App\Core\Databases\DB;
use App\Core\Databases\MySQL;
use App\Core\Promises\CorePromise;
use App\Core\Promises\ExtremeCorePromise;
use GuzzleHttp\Psr7\Request;
use Jenssegers\Blade\Blade;

class Core
{

    /**
     * @var ExtremeCorePromise
     */
    private $promise;

    /**
     * @var DB | null
     */
    private $DB = null;

    private $Blade;

    public function __construct()
    {
        $this->Blade = new Blade(
            $_SERVER['DOCUMENT_ROOT']."/resources/views",
            $_SERVER['DOCUMENT_ROOT']."/app/cache");

        $this->settingPromises();

        if ($this->promise->getConfig()->getPromise()->getDatabases()->getMySQL()->getEnabled())
        {
            $this->DB = new DB(new MySQL($this));
        }
    }

    /**
     * @return Blade
     */
    public function getBlade(): Blade
    {
        return $this->Blade;
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