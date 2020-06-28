<?php


namespace App\Core;


use App\Core\Promises\ConfigPromise;

class Configuration
{

    private $array_config;

    private $promise;

    public function __construct()
    {

        $this->setArrayConfig();

        $this->promise = new ConfigPromise();

        $this->promise->getApplication()->setName($this->array_config['application']['name']);
        $this->promise->getApplication()->setVersion($this->array_config['application']['version']);
        $this->promise->getApplication()->setDescription($this->array_config['application']['description']);

    }

    /**
     * @return ConfigPromise
     */
    public function getPromise() : ConfigPromise
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