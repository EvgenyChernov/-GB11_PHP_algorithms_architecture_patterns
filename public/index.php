<?php

use app\factorydb\connection\{DBMySQLFactory, Db, DBPostgreSQLFactory, DBOracleFactory};
use app\factorydb\querybuilder\{DBQueryBuilder, DBQueryBuilderMySQL, DBQueryBuilderPostgreSQL, DBQueryBuilderOracle};
use app\engine\Autoload;

include dirname(__DIR__) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";
include ROOT_DIR . DS . "engine" . DS . "Autoload.php";
spl_autoload_register([new Autoload(), 'loadClass']);

function connecting(Db $db)
{
    $db->getConnection();
}

function getProduct(DBQueryBuilder $dBQueryBuilder)
{
    return $dBQueryBuilder->getProduct();
}

connecting(new DBMySQLFactory);


$product = getProduct(new DBQueryBuilderMySQL);
$product->name = 'Чай';
$product->description = 'Липтон';
$a = $product::get();
var_dump($a);

