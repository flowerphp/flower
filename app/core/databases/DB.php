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
     * @return bool
     * @deprecated
     */
    public function query(string $query, array $params) : bool
    {
        $stmt = $this->connection->prepare($query);
        $this->bindParams($stmt, $params);
        return $stmt->execute();
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool|PDOStatement
     */
    public function dbQuery(string $query, array $params = [])
    {
        $stmt = $this->connection->prepare($query);
        if (!empty($params))
            $stmt = $this->bindParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    /**
     * @param PDOStatement $statement
     * @param array $params
     * @return PDOStatement
     */
    private function bindParams(PDOStatement $statement , array $params) : PDOStatement
    {
        foreach ($params as $param => $valueParam)
        {
            $statement->bindValue(":".$param, $valueParam);
        }
        return $statement;
    }

    /**
     * @param string $query
     * @param array $params
     * @return mixed
     */
    public function getColumn(string $query, array $params = [])
    {
        return $this->dbQuery($query, $params)->fetchColumn();
    }

    public function getRow(string $query, array $params = [])
    {
        return $this->dbQuery($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }
}