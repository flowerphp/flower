<?php


namespace App\Core;


use App\Core\Promises\ConfigPromise;
use App\Core\Promises\ExtremeConfigPromise;

class Configuration
{

    private $array_config;

    private $promise;

    public function __construct()
    {

        $this->setArrayConfig();

        $ConfigPromise = new ConfigPromise();

        $ConfigPromise->getApplication()->setName($this->array_config['application']['name']);
        $ConfigPromise->getApplication()->setVersion($this->array_config['application']['version']);
        $ConfigPromise->getApplication()->setDescription($this->array_config['application']['description']);

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