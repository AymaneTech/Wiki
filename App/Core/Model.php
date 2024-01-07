<?php

namespace App\Core;

use App\Core\Database;
use PDOException;
use PDO;

abstract class Model
{
    private $tableName;
    private $columns = ["*"];
    private $dbh;
    public function __construct($tableName)
    {
        $this->dbh = Database::getInstance();
        $this->dbh = $this->dbh->connect();
        $this->tableName = $tableName;
    }
    public function __set($property, $value) { $this->$property = $value; }
    public function __get($property) { return $this->$property; }
    protected function getAll()
    {
        try {
            $columns = implode(',', $this->columns);
            $stmt = $this->dbh->query("SELECT {$columns} FROM {$this->tableName}");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("error in selecting" . $e->getMessage());
        }
    }
    protected function save($data){
        try{
            $columns = implode(',', array_keys($data));
            $placeholders = implode(',', array_fill(0, count($data), '?'));
            $query = "INSERT INTO {$this->tableName} ({$columns}) values ($placeholders)";
            $stmt = $this->dbh->prepare($query);
            $stmt->execute(array_values($data));
        }catch(PDOException $e){
            die("error in selecting" . $e->getMessage());
        }
    }
}