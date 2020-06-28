<?php


namespace App\Core;


use App\Core\Promises\CorePromise;
use GuzzleHttp\Psr7\Request;

class Core
{

    private $promise;

    public function __construct(Request $request)
    {
        $this->promise = new CorePromise();
        $this->promise->setRequest($request);
        $this->promise->setConfig(new Configuration());
    }

    /**
     * @return CorePromise
     */
    public function getPromise() : CorePromise
    {
        return $this->promise;
    }
}