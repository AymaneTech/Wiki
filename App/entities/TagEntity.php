<?php
namespace App\Models\entities;

class TagEntity
{
    private $tagId;
    private $tagName;
    public function __construct($tagName = "", $tagId = null){
        $this->tagId = $tagId;
        $this->tagName = $tagName;
    }
    public function __get($property){
        if (property_exists($this, $property)) return $this->$property;
        else die ($property . " property does not exist" .__CLASS__);
    }
    public function __set($property, $value){
        if (property_exists($this, $property)) $this->$property = $value;
        else die ($property . " property does not exist " . __CLASS__);
    }
}