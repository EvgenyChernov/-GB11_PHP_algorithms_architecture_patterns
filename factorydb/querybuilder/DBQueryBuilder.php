<?php


namespace app\factorydb\querybuilder;


abstract class DBQueryBuilder
{
    abstract public static function first($id);

    abstract public static function get(): array;

    abstract public function insert();

    abstract public function delete();

    abstract public function update();

    abstract public function getProduct();

}