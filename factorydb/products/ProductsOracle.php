<?php

namespace app\factorydb\products;

use app\factorydb\querybuilder\DBQueryBuilderOracle;

class ProductsOracle extends DBQueryBuilderOracle
{
    public $id;
    public $name;
    public $description;
    public $price;

    public $props = [
        [
            'name' => false,
            'description' => false,
            'price' => false
        ]
    ];

    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public static function getTableName()
    {
        return 'products';
    }
}