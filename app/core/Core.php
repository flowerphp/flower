<?php


namespace App\Core;


use App\Core\Promises\CorePromise;
use App\Core\Promises\ExtremeCorePromise;
use GuzzleHttp\Psr7\Request;

class Core
{

    /**
     * @var ExtremeCorePromise
     */
    private $promise;

    public function __construct()
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
     * @return ExtremeCorePromise
     */
    public function getPromise() : ExtremeCorePromise
    {
        return $this->promise;
    }
}