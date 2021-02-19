<?php


namespace app\factorydb\record;


abstract class DBRecord
{

    abstract protected function query($sql, $params);

    abstract public function execute($sql, $params = []);

    abstract public function queryObject($sql, $params, $class);

    abstract public function queryOne($sql, $params = [], $class);

    abstract public function queryAll($sql, $params = []);
}