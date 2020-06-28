<?php


namespace App\Core\Promises;


use App\Core\Configuration;
use GuzzleHttp\Psr7\Request;

final class ExtremeCorePromise extends ExtremePromise
{

    private $request;
    private $config;

    public function __construct(CorePromise $corePromise)
    {
        $this->request = $corePromise->getRequest();
        $this->config = $corePromise->getConfig();
    }

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }
}