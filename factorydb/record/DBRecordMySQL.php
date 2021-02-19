<?php


namespace app\factorydb\record;

use app\traits\TSingletone;

class DBRecordMySQL extends DBRecord
{
    private $connection = null;

    use TSingletone;

    protected $config = [
        'driver' => 'mysql',
        'host' => '127.0.0.1:3307',
        'login' => 'root',
        'password' => 'root',
        'database' => 'shop',
        'charset' => 'utf8'
    ];

    public function getConnection(): \PDO
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO($this->prepareDsnString(), $this->config['login'], $this->config['password']);
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset'],
        );
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    protected function query($sql, $params)
    {
        $proStatement = $this->getConnection()->prepare($sql);
        $proStatement->execute($params);
        return $proStatement;
    }

    public function execute($sql, $params = [])
    {
        return $this->query($sql, $params);
    }

    public function queryObject($sql, $params, $class)
    {
        $proStatement = $this->getConnection()->prepare($sql);
        $proStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        $proStatement->execute($params);
        return $proStatement;
    }

    public function queryOne($sql, $params = [], $class)
    {
        return $this->queryObject($sql, $params, $class)->fetch();
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }
}