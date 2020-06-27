<?php


namespace App\Core\Databases;


use PDO;

class MySQL
{
    private $host_name;
    private $db_name;
    private $user_name;
    private $password;

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

    public function __construct(string $host_name, $db_name, $user_name, $password)
    {
        $this->host_name = $host_name;
        $this->db_name = $db_name;
        $this->user_name = $user_name;
        $this->password = $password;
    }

    /**
     * @return PDO
     */
    public function getConnection() : PDO
    {
        return new PDO(
            $this->getHostName(),
            $this->getUserName(),
            $this->getPassword()
        );
    }
}