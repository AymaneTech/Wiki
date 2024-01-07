<?php

namespace App\Models\repositories;
use App\Core\Model;
use App\Models\Entities\TagEntity;
use App\Helpers\Functions;

class Tag extends Model
{
    public function __construct(){
        parent::__construct("tag");
    }
    public function saveTag(TagEntity $tag){
        $data["tagName"] = $tag->__get("tagName");
        $this->save($data);
    }
}