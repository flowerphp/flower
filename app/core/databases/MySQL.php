<?php


namespace App\Core\Databases;


use App\Core\Core;
use PDO;

class MySQL
{
    private $host_name;
    private $db_name;
    private $user_name;
    private $password;

    private $Core;

    public function __construct(Core $core)
    {
        $this->Core = $core;

        $this->host_name = $core
            ->getPromise()
            ->getConfig()
            ->getPromise()
            ->getDatabases()
            ->getMySQL()
            ->getHost();

        $this->db_name = $core
            ->getPromise()
            ->getConfig()
            ->getPromise()
            ->getDatabases()
            ->getMySQL()
            ->getDataBaseName();

        $this->user_name = $core
            ->getPromise()
            ->getConfig()
            ->getPromise()
            ->getDatabases()
            ->getMySQL()
            ->getUserName();

        $this->password = $core
            ->getPromise()
            ->getConfig()
            ->getPromise()
            ->getDatabases()
            ->getMySQL()
            ->getPassword();
    }

    /**
     * @return string
     */
    public function getDbName() : string
    {
        return $this->db_name;
    }

    /**
     * @return string
     */
    public function getHostName() : string
    {
        return $this->host_name;
    }

    /**
     * @return string
     */
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getUserName() : string
    {
        return $this->user_name;
    }

    /**
     * @return PDO
     */
    public function getConnection() : PDO
    {
        return new PDO(
            "mysql:host=".$this->getHostName().";dbname=".$this->getDbName(),
            $this->getUserName(),
            $this->getPassword()
        );
    }
}