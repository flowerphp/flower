<?php


namespace App\Core\Promises;


final class ExtremeMysqlDatabasesConfigPromise extends ExtremePromise
{
    private $enabled;
    private $host;
    private $user_name;
    private $data_base_name;
    private $password;

    public function __construct(MysqlDatabasesConfigPromise $mysqlDatabasesConfigPromise)
    {
        $this->enabled = $mysqlDatabasesConfigPromise->getEnabled();
        $this->host = $mysqlDatabasesConfigPromise->getHost();
        $this->user_name = $mysqlDatabasesConfigPromise->getUserName();
        $this->data_base_name = $mysqlDatabasesConfigPromise->getDataBaseName();
        $this->password = $mysqlDatabasesConfigPromise->getPassword();
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getDataBaseName(): string
    {
        return $this->data_base_name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEnabled(): string
    {
        return $this->enabled;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }
}