<?php
namespace App\Models\entities;
class wikiTagEntity
{
    private $pivotId;
    private WikiEntity $wiki;
    private TagEntity $tag;
    public function __construct( $pivotId = null, $tag = null, $wiki = null){
        $this->pivotId = $pivotId;
        $this->wiki = $wiki;
        $this->tag = $tag;
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