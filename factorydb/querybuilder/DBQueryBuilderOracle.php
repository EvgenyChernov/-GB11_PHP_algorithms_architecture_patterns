<?php


namespace app\factorydb\querybuilder;


use app\factorydb\products\ProductsOracle;

class DBQueryBuilderOracle extends DBQueryBuilder
{

    public static function first($id)
    {
        // TODO: Implement first() method.
    }

    public static function get(): array
    {
        // TODO: Implement get() method.
    }

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function getProduct()
    {
        return new ProductsOracle();
    }
}