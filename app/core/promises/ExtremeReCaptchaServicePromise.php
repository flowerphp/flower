<?php


namespace App\Core\Promises;


final class ExtremeReCaptchaServicePromise extends ExtremePromise
{
    private $enabled;
    private $SiteKey;
    private $SecretKey;

    public function __construct(reCaptchaServiceConfigPromise $reCaptchaServicePromise)
    {
        $this->enabled = $reCaptchaServicePromise->getEnabled();
        $this->SecretKey = $reCaptchaServicePromise->getSecretKey();
        $this->SiteKey = $reCaptchaServicePromise->getSiteKey();
    }

    /**
     * @return string
     */
    public function getSiteKey() : string
    {
        return $this->SiteKey;
    }

    /**
     * @return string
     */
    public function getSecretKey() : string
    {
        return $this->SecretKey;
    }

    /**
     * @return boolean
     */
    public function getEnabled() : bool
    {
        return $this->enabled;
    }

}