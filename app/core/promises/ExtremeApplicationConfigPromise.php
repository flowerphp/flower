<?php


namespace App\Core\Promises;


final class ExtremeApplicationConfigPromise extends ExtremePromise
{
    private $name;
    private $version;
    private $description;

    public function __construct(ApplicationConfigPromise $applicationConfigPromise)
    {
        $this->name = $applicationConfigPromise->getName();
        $this->version = $applicationConfigPromise->getVersion();
        $this->description = $applicationConfigPromise->getDescription();
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}