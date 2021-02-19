<?php


namespace app\factorydb\connection;

use app\factorydb\record\DBRecordOracle;

class DBOracleFactory extends Db
{
    public function getConnection()
    {
        DBRecordOracle::getInstance()->getConnection();
    }
}