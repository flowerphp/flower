<?php


namespace App\Core\Promises;


final class ExtremeConfigPromise extends ExtremePromise
{
    private $application;
    private $reCaptchaService;
    private $databases;

    public function __construct(ConfigPromise $configPromise)
    {
        $this->application = new ExtremeApplicationConfigPromise($configPromise->getApplication());
        $this->reCaptchaService = new ExtremeReCaptchaServicePromise($configPromise->getReCaptchaService());
        $this->databases = new ExtremeDatabasesConfigPromise($configPromise->getDatabases());
    }

    /**
     * @return ExtremeApplicationConfigPromise
     */
    public function getApplication(): ExtremeApplicationConfigPromise
    {
        return $this->application;
    }

    /**
     * @return ExtremeReCaptchaServicePromise
     */
    public function getReCaptchaService(): ExtremeReCaptchaServicePromise
    {
        return $this->reCaptchaService;
    }

    /**
     * @return ExtremeDatabasesConfigPromise
     */
    public function getDatabases(): ExtremeDatabasesConfigPromise
    {
        return $this->databases;
    }
}