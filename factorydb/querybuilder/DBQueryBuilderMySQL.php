<?php

namespace app\factorydb\querybuilder;

use app\factorydb\products\ProductsMySQL;
use app\factorydb\record\DBRecordMySQL as Db;

class DBQueryBuilderMySQL extends DBQueryBuilder
{


    public static function first($id)
    {
        $tableName = static::getTableName();
        $sql = "select * from {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id], static::class);
    }

    public static function get(): array
    {
        $tableName = static::getTableName();
        $sql = "select * from {$tableName} ";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert()
    {
        $tableName = static::getTableName();
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($key === 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        var_dump($sql);
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id])->rowCount();
    }

    public function update()
    {
        $tableName = static::getTableName();
        $params = [];
        $columns = [];
        foreach ($this as $key => $value) {
            $params[":{$key}"] = $value;
            if ($key === 'id') continue;
            $columns[] = "`$key` = :$key ";
        }
        $columns = implode(", ", $columns);
        $sql = "UPDATE {$tableName} SET {$columns} WHERE id = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }

    public function getProduct()
    {
        return new ProductsMySQL();
    }
}