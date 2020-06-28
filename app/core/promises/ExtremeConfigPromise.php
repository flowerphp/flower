<?php


namespace App\Core\Promises;


final class ExtremeConfigPromise extends ExtremePromise
{
    private $application;

    public function __construct(ConfigPromise $configPromise)
    {
        $this->application = new ExtremeApplicationConfigPromise($configPromise->getApplication());
    }

    /**
     * @return ExtremeApplicationConfigPromise
     */
    public function getApplication(): ExtremeApplicationConfigPromise
    {
        return $this->application;
    }
}