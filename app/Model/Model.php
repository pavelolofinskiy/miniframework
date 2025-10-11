<?php

namespace App\Model;
use Db\Database;

class Model extends Database

{

public $string;

    public function __construct()
    {
            $this->getConnection();
    }

    public function createTable(string $tableName, array $columns): void
    {
        $cols = [];

        foreach ($columns as $name => $type) {
            $cols[] = "`$name` $type";
        }

        $columnsSql = implode(", ", $cols);

        $sql = "CREATE TABLE IF NOT EXISTS `$tableName` ($columnsSql)";

        $this->pdo->exec($sql);
    }

    public function all($tableName){
        $sql = "SELECT * FROM `$tableName`";
        $this->pdo->exec($sql);
    }
}