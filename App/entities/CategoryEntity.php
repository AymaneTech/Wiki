<?php
namespace App\Models\entities;
class CategoryEntity
{
    private $categoryId;
    private $categoryName;
    private $categoryDescription;
    private $categoryImage;
    public function __construct($categoryName = "", $categoryDescription = "", $categoryImage = null, $categoryId = null){
        $this->categoryId = $categoryId;
        $this->categoryName = $categoryName;
        $this->categoryDescription = $categoryDescription;
        $this->categoryImage = $categoryImage;
    }
    public function __get($property){
        if (property_exists($this, $property)) return $this->$property;
        else die ($property . " property does not exist". __CLASS__);
    }
    public function __set($property, $value){
        if (property_exists($this, $property)) $this->$property = $value;
        else die ($property . " property does not exist" . __CLASS__);
    }
}
