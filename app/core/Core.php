<?php


namespace App\Core;


use App\Core\Promises\CorePromise;
use App\Core\Promises\ExtremeCorePromise;
use GuzzleHttp\Psr7\Request;

class Core
{

    private $promise;

    public function __construct(Request $request)
    {
        $CorePromise = new CorePromise();
        $CorePromise->setRequest($request);
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