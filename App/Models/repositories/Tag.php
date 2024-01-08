<?php

namespace App\Models\repositories;

use App\Core\Model;
use App\Models\Entities\TagEntity;
use App\Helpers\Functions;

class Tag extends Model
{
    public function __construct()
    {
        parent::__construct("tag");
    }

    public function saveTag(TagEntity $tag)
    {
        $data["tagName"] = $tag->__get("tagName");
        $this->save($data);
    }

    public function getAllTags()
    {
        return $this->getAll();
    }
    public function deleteTag(TagEntity $tagEntity)
    {
        $id = $tagEntity->__get("tagId");
        $this->delete('tagId' ,$id);
    }

    public function findById(TagEntity $tagEntity)
    {
        $id = $tagEntity->__get("tagId");
        $result = $this->findByColumn("tagId", $id);
        return $result[0];
    }
    public function updateTag(TagEntity $tagEntity)
    {
        $condition = ["tagId" => $tagEntity->__get("tagId")];
        $data["tagName"] = $tagEntity->__get("tagName");
        $this->update($data, $condition);
    }
}