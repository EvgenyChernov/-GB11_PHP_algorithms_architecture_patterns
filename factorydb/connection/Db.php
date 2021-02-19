<?php


namespace app\factorydb\connection;

abstract class Db
{

    public function __construct()
    {
        $this->getConnection();
    }

    abstract public function getConnection();
}