<?php


namespace App\Core\Promises;


class ConfigPromise extends Promise
{
    private $application;

    public function __construct()
    {
        $this->application = new ApplicationConfigPromise();
    }

    /**
     * @return ApplicationConfigPromise
     */
    public function getApplication(): ApplicationConfigPromise
    {
        return $this->application;
    }

    /**
     * @param ApplicationConfigPromise $application
     */
    public function setApplication(ApplicationConfigPromise $application)
    {
        $this->application = $application;
    }
}