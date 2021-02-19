<?php


namespace app\factorydb\connection;

use app\factorydb\record\DBRecordMySQL;

class DBMySQLFactory extends Db
{
    public function getConnection()
    {
        DBRecordMySQL::getInstance()->getConnection();
    }
}