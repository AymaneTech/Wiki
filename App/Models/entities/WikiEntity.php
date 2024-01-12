<?php
namespace App\Models\entities;
class WikiEntity
{
    private $wikiId;
    private $wikiTitle;
    private $wikiContent;
    private $wikiDescription;
    private $wikiImage;
    private $isArchived;
    private UserEntity $author;
    private CategoryEntity $category;
    private $createdAt;
    private $updatedAt;
    public function __construct( $wikiTitle = "", $wikiDescription = "", $wikiContent = "", $wikiImage = null, $createdAt = null, $wikiId = null){
        $this->wikiId = $wikiId;
        $this->wikiTitle = $wikiTitle;
        $this->wikiContent = $wikiContent;
        $this->wikiDescription = $wikiDescription;
        $this->wikiImage = $wikiImage;
        $this->createdAt = $createdAt;
        $this->isArchived = 0;

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