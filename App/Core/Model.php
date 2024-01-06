<?php

namespace App\Core;

use App\Core\Database;
use PDOException;

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
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("error in selecting" . $e->getMessage());
        }
    }
    protected function Create($object){
        try{
            $columns = implode(',', array_keys(get_object_vars($object)));
            $placeholders = implode(',', array_fill(0, count(get_object_vars($object)), '?'));
            $stmt = $this->dbh->prepare("INSERT INTO {$this->tableName} ({$columns}) values ($placeholders)");
            $i = 1;
            foreach (get_object_vars($object) as $value){
                $stmt->bindValue($i++, $value);
            }
            $stmt->execute();
        }catch(PDOException $e){
            die("error in selecting" . $e->getMessage());
        }
    }
}