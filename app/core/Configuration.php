<?php


namespace App\Core;


use App\Core\Promises\ApplicationConfigPromise;
use App\Core\Promises\ConfigPromise;
use App\Core\Promises\DatabasesConfigPromise;
use App\Core\Promises\ExtremeConfigPromise;
use App\Core\Promises\MysqlDatabasesConfigPromise;
use App\Core\Promises\reCaptchaServiceConfigPromise;

class Configuration
{

    private $array_config;

    private $promise;

    public function __construct()
    {

        $this->setArrayConfig();

        $ConfigPromise = new ConfigPromise();

        $Application = new ApplicationConfigPromise();
        $reCaptchaService = new reCaptchaServiceConfigPromise();
        $Databases = new DatabasesConfigPromise();

        $Application->setName($this->array_config['application']['name']);
        $Application->setVersion($this->array_config['application']['version']);
        $Application->setDescription($this->array_config['application']['description']);

        $reCaptchaService->setEnabled($this->array_config['reCaptchaService']['enabled']);
        $reCaptchaService->setSecretKey($this->array_config['reCaptchaService']['SecretKey']);
        $reCaptchaService->setSiteKey($this->array_config['reCaptchaService']['SiteKey']);

        $MySQL = new MysqlDatabasesConfigPromise();
        $MySQL->setEnabled($this->array_config['databases']['MySQL']['enabled']);
        $MySQL->setDataBaseName($this->array_config['databases']['MySQL']['data_base_name']);
        $MySQL->setHost($this->array_config['databases']['MySQL']['host']);
        $MySQL->setUserName($this->array_config['databases']['MySQL']['user_name']);
        $MySQL->setPassword($this->array_config['databases']['MySQL']['password']);

        $Databases->setMySQL($MySQL);



        $ConfigPromise->setApplication($Application);
        $ConfigPromise->setReCaptchaService($reCaptchaService);
        $ConfigPromise->setDatabases($Databases);

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