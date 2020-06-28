<?php


namespace App\Core\Promises;


class DatabasesConfigPromise extends Promise
{
    private $MySQL;

    /**
     * @return MysqlDatabasesConfigPromise
     */
    public function getMySQL()
    {
        return $this->MySQL;
    }

    /**
     * @param MysqlDatabasesConfigPromise $MySQL
     */
    public function setMySQL($MySQL)
    {
        $this->MySQL = $MySQL;
    }
}