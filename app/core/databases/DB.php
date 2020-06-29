<?php


namespace App\Core\Databases;


use PDO;
use PDOStatement;

class DB
{
    /**
     * @var PDO
     */
    private $connection;

    public function __construct(iDriverDB $driver)
    {
        $this->connection = $driver->getConnection();
    }

    /**
     * @param string $query
     * @param array $params
     */
    public function query(string $query, array $params)
    {
        $stmt = $this->connection->prepare($query);
        $this->bindParams($stmt, $params);
    }

    /**
     * @param PDOStatement $statement
     * @param array $params
     */
    private function bindParams(PDOStatement $statement , array $params)
    {
        foreach ($params as $param => $valueParam)
        {
            $statement->bindParam($param, $valueParam);
        }
    }
}