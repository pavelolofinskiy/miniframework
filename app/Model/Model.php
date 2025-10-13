<?php

namespace App\Model;
use Db\Database;

class Model extends Database

{
    public function __construct()
    {
        $this->getConnection();
    }

    public function createTable(string $tableName, array $columns): void
    {
        try {
        $cols = [];

        foreach ($columns as $name => $type) {
            $cols[] = "`$name` $type";
        }

        $columnsSql = implode(", ", $cols);

        $sql = "CREATE TABLE IF NOT EXISTS `$tableName` ($columnsSql)";

        $this->pdo->exec($sql);
        } catch (\PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        }
    }

    public function all($tableName){
        try {
            $sql = "SELECT * FROM `$tableName`";
            return $this->pdo->exec($sql);
        } catch (\PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        }

    }

    public function add($tableName, $columnName, $value) {
        try {
            $sql = "INSERT INTO `$tableName` ($columnName) VALUES ($value)";
            return $this->pdo->exec($sql);
        } catch (\PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        }
    }
}