<?php

namespace App\Models\Services;
use App\Models\repositories\Tag;
use App\Models\entities\TagEntity;
use App\Helpers\Functions;
class TagService
{
    private $tag;
    public function __construct(){
        $this->tag = new Tag();
    }
    public function saveTag($tag){
        $tagEntity = new TagEntity($tag["tagName"]);
        $this->tag->saveTag($tagEntity);
    }
    public function getTags(){
        $array = [];
        $categories = $this->tag->getAllTags();
        foreach($categories as $tag){
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