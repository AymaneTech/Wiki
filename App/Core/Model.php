<?php

namespace App\Core;

use App\Core\Database;
use PDOException;
use PDO;
use App\Helpers\Functions;

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

    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    protected function getAll()
    {
        try {
            $columns = implode(',', $this->columns);
            $stmt = $this->dbh->query("SELECT {$columns} FROM {$this->tableName} limit 10");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("error in selecting" . $e->getMessage());
        }
    }

    public function getPagination($pagination)
    {
        try {
            $limit = 10;
            $pagination = (int)$pagination;
            $offset = ($pagination - 1) * $limit;

            $columns = implode(',', $this->columns);
            $stmt = $this->dbh->prepare("SELECT {$columns} FROM {$this->tableName} LIMIT :offset, :limit");
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    protected function save($data)
    {
        try {
            $columns = implode(',', array_keys($data));
            $placeholders = implode(',', array_fill(0, count($data), '?'));
            $query = "INSERT INTO {$this->tableName} ({$columns}) values ($placeholders)";
            $stmt = $this->dbh->prepare($query);
            $stmt->execute(array_values($data));
        } catch (PDOException $e) {
            die("error in selecting" . $e->getMessage());
        }
    }

    protected function delete($column, $value)
    {
        try {
            $stmt = $this->dbh->prepare("DELETE FROM {$this->tableName} WHERE {$column} = ?");
            $stmt->execute([$value]);
        } catch (PDOException $e) {
            die("error in deleting" . $e->getMessage());
        }
    }

    public function update($data, $condition)
    {
        try {
            $placeholders = implode('=?, ', array_keys($data)) . '=?';
            foreach ($condition as $item => $value) {
                $whereClause = $item . " = ?";
            }
            $query = "UPDATE {$this->tableName} SET {$placeholders} WHERE {$whereClause}";
            $stmt = $this->dbh->prepare($query);
            $values = array_merge(array_values($data), array_values($condition));
            $stmt->execute($values);
        } catch (PDOException $e) {
            die("error in selecting" . $e->getMessage());
        }
    }

    public function findByColumn($column, $value)
    {
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM {$this->tableName} WHERE {$column} = ?");
            $stmt->execute([$value]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("error in deleting" . $e->getMessage());
        }
    }

    public function findOneByColumn($column, $value)
    {
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM {$this->tableName} WHERE {$column} = ?");
            $stmt->bindParam(1, $value);
            $stmt->execute();
        } catch (PDOException $e) {
            die("error in finding one by column method in base model column =>  {$column}, value =>  {$value} " . $e->getMessage());
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}