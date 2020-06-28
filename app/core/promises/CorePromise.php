<?php


namespace App\Core\Promises;


use App\Core\Configuration;
use GuzzleHttp\Psr7\Request;

class CorePromise extends Promise
{
    private $request;
    private $config;

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

    /**
     * @return Configuration
     */
    public function getConfig() : Configuration
    {
        return $this->config;
    }

    /**
     * @param string $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

}