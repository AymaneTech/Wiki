<?php

namespace App\Models\Services;

use App\Models\entities\TagEntity;
use App\Models\repositories\TagRepository;

class TagService
{
    private $tag;
    public function __construct(){
        $this->tag = new TagRepository();
    }
    public function saveTag($tag){
        $tagEntity = new TagEntity($tag["tagName"]);
        $this->tag->saveTag($tagEntity);
    }
    public function getTags(){
        $array = [];
        $tags = $this->tag->getAllTags();
        foreach($tags as $tag){
            $tagEntity = new TagEntity($tag->tagName, $tag->tagId);
            $array[] = $tagEntity;
        }
        return $array;
    }
    public function deleteTag($id){
        $tagEntity = new tagEntity();
        $tagEntity->__set("tagId", $id);
        $this->tag->deleteTag($tagEntity);
    }
    public function findById($id){
        $tagEntity = new tagEntity();
        $tagEntity->__set("tagId", $id);
        return $this->tag->findById($tagEntity);
    }
    public function updateTag($tag){
        $tagEntity = new TagEntity($tag["tagName"], $tag["tagId"]);
        $this->tag->updateTag($tagEntity);
    }
}