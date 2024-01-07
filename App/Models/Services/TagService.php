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
}