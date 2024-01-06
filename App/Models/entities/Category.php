<?php
namespace App\Models\entities;
class Category
{
    private $categoryId;
    private $categoryName;
    private $categoryDescription;
    private $categoryImage;
    public function __construct($categoryId = null, $categoryName = "", $categoryDescription = "", $categoryImage = null){
        $this->categoryId = $categoryId;
        $this->categoryName = $categoryName;
        $this->categoryDescription = $categoryDescription;
        $this->categoryImage = $categoryImage;
    }
    public function __get($property){
        if (property_exists($this, $property)) return $this->$property;
        else die ($property . " property does not exist");
    }
    public function __set($property, $value){
        if (property_exists($this, $property)) $this->$property;
        else die ($property . " property does not exist");
    }

}