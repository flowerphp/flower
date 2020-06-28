<?php


namespace App\Core\Promises;


class ConfigPromise extends Promise
{
    private $application;
    private $reCaptchaService;

    public function __construct()
    {
        $this->application = new ApplicationConfigPromise();
        $this->reCaptchaService = new reCaptchaServicePromise();
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
     * @return reCaptchaServicePromise
     */
    public function getReCaptchaService(): reCaptchaServicePromise
    {
        return $this->reCaptchaService;
    }

    /**
     * @param reCaptchaServicePromise $reCaptchaService
     */
    public function setReCaptchaService(reCaptchaServicePromise $reCaptchaService)
    {
        $this->reCaptchaService = $reCaptchaService;
    }
}