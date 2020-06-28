<?php


namespace App\Core\Promises;


class reCaptchaServiceConfigPromise extends Promise
{
    private $enabled;
    private $SiteKey;
    private $SecretKey;

    /**
     * @return boolean
     */
    public function getEnabled() : bool
    {
        return $this->enabled;
    }

    /**
     * @return string
     */
    public function getSecretKey() : string
    {
        return $this->SecretKey;
    }

    /**
     * @return string
     */
    public function getSiteKey() : string
    {
        return $this->SiteKey;
    }

    /**
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @param string $SecretKey
     */
    public function setSecretKey($SecretKey)
    {
        $this->SecretKey = $SecretKey;
    }

    /**
     * @param string $SiteKey
     */
    public function setSiteKey($SiteKey)
    {
        $this->SiteKey = $SiteKey;
    }
}