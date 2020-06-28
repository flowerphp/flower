<?php


namespace App\Core\Promises;


final class ExtremeDatabasesConfigPromise extends ExtremePromise
{

    private $MySQL;

    public function __construct(DatabasesConfigPromise $databasesConfigPromise)
    {
        $this->MySQL = new ExtremeMysqlDatabasesConfigPromise($databasesConfigPromise->getMySQL());
    }

    /**
     * @return ExtremeMysqlDatabasesConfigPromise
     */
    public function getMySQL(): ExtremeMysqlDatabasesConfigPromise
    {
        return $this->MySQL;
    }

}