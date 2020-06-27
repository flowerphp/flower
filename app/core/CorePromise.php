<?php


namespace App\Core;


use GuzzleHttp\Psr7\Request;

class CorePromise extends Promise
{
    private $request;

    /**
     * @return Request
     */
    public function getRequest() : Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }
}