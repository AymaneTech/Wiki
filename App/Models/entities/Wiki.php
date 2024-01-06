<?php
namespace App\Models\entities;
class Wiki
{
    private $wikiId;
    private $wikiTitle;
    private $wikiContent;
    private $wikiDescription;
    private $wikiImage;
    private User $author;
    private Category $category;
    public function __construct($wikiId = null, $wikiTitle = "", $wikiContent = "", $wikiDescription = "", $wikiImage = null){
        $this->wikiId = $wikiId;
        $this->wikiTitle = $wikiTitle;
        $this->wikiContent = $wikiContent;
        $this->wikiDescription = $wikiDescription;
        $this->wikiImage = $wikiImage;
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