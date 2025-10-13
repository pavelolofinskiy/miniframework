<?php

namespace Db;

abstract class Database {
    protected $pdo;

    public function getConnection() {
        $host = 'localhost'; 
        $dbname = 'miniframework'; 
        $username = 'root'; 
        $password = 'root'; 

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            $this->pdo = new \PDO($dsn, $username, $password); // ← обратите внимание на обратный слеш

            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false); 

            echo "Connected successfully to the database!";
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit(); 
        }
        return $this->pdo;
    }
}