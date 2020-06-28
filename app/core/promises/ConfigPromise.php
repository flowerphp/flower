<?php


namespace App\Core\Promises;


class ConfigPromise extends Promise
{
    private $application;
    private $reCaptchaService;
    private $databases;

    public function __construct()
    {
        $this->application = new ApplicationConfigPromise();
        $this->reCaptchaService = new reCaptchaServiceConfigPromise();
        $this->databases = new DatabasesConfigPromise();
    }

    /**
     * @param DatabasesConfigPromise $databases
     */
    public function setDatabases(DatabasesConfigPromise $databases)
    {
        $this->databases = $databases;
    }

    /**
     * @return DatabasesConfigPromise
     */
    public function getDatabases(): DatabasesConfigPromise
    {
        return $this->databases;
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

    /**
     * @return reCaptchaServiceConfigPromise
     */
    public function getReCaptchaService(): reCaptchaServiceConfigPromise
    {
        return $this->reCaptchaService;
    }

    /**
     * @param reCaptchaServiceConfigPromise $reCaptchaService
     */
    public function setReCaptchaService(reCaptchaServiceConfigPromise $reCaptchaService)
    {
        $this->reCaptchaService = $reCaptchaService;
    }
}