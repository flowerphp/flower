<?php


namespace App\Core;


use App\Core\Promises\ApplicationConfigPromise;
use App\Core\Promises\ConfigPromise;
use App\Core\Promises\ExtremeConfigPromise;
use App\Core\Promises\reCaptchaServicePromise;

class Configuration
{

    private $array_config;

    private $promise;

    public function __construct()
    {

        $this->setArrayConfig();

        $ConfigPromise = new ConfigPromise();
        $Application = new ApplicationConfigPromise();
        $reCaptchaService = new reCaptchaServicePromise();

        $Application->setName($this->array_config['application']['name']);
        $Application->setVersion($this->array_config['application']['version']);
        $Application->setDescription($this->array_config['application']['description']);

        $reCaptchaService->setEnabled($this->array_config['reCaptchaService']['enabled']);
        $reCaptchaService->setSecretKey($this->array_config['reCaptchaService']['SecretKey']);
        $reCaptchaService->setSiteKey($this->array_config['reCaptchaService']['SiteKey']);


        $ConfigPromise->setApplication($Application);
        $ConfigPromise->setReCaptchaService($reCaptchaService);

        $this->promise = new ExtremeConfigPromise($ConfigPromise);

    }

    /**
     * @return ExtremeConfigPromise
     */
    public function getPromise() : ExtremeConfigPromise
    {
        return $this->promise;
    }

    /**
     * @version 1.0
     */
    private function setArrayConfig()
    {
        $this->array_config = json_decode(file_get_contents("config.json"), true);
    }

}