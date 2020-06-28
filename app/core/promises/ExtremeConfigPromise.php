<?php


namespace App\Core\Promises;


final class ExtremeConfigPromise extends ExtremePromise
{
    private $application;
    private $reCaptchaService;

    public function __construct(ConfigPromise $configPromise)
    {
        $this->application = new ExtremeApplicationConfigPromise($configPromise->getApplication());
        $this->reCaptchaService = new ExtremeReCaptchaServicePromise($configPromise->getReCaptchaService());
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
}