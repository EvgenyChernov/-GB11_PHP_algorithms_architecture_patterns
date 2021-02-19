<?php


namespace app\factorydb\connection;


use app\factorydb\record\DBRecordPostgreSQL;

class DBPostgreSQLFactory extends Db
{
    public function getConnection()
    {
        DBRecordPostgreSQL::getInstance()->getConnection();
    }
}