<?php

namespace core\Model;
use Db\Database;

class Model extends Database

{

    protected string $table;

    public function __construct()
    {
        $this->getConnection();
        if (!isset($this->table)) {
            $this->table = $this->inferTableName();
        }
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

    protected function inferTableName(): string
    {
        $className = (new \ReflectionClass($this))->getShortName();

        $table = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $className)) . 's';

        return $table;
    }

    public function add($columnName, $value) {
        try {
            print_r($columnName);
            print_r($value);
            $sql = "INSERT INTO `$this->table` (`$columnName`) VALUES (`$value`)";
            return $this->pdo->exec($sql);
        } catch (\PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        }
    }
}