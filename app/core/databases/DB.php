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
     * @return PDOStatement
     */
    public function query(string $query, array $params) : PDOStatement
    {
        $stmt = $this->connection->prepare($query);
        $this->bindParams($stmt, $params);
        return $stmt;
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

    /**
     * @param PDOStatement $statement
     * @param int $column_number
     * @return mixed
     */
    public function getColumn(PDOStatement $statement, int $column_number)
    {
        return $statement->fetchColumn($column_number);
    }
}