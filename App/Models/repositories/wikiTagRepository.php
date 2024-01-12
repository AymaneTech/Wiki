<?php

namespace App\Models\repositories;
use App\Models\entities\wikiTagEntity;
class wikiTagRepository extends \App\Core\Model
{
    public function __construct()
    {
        parent::__construct("wikiTag");
    }
    public function saveWikiTag(WikiTagEntity $wikiTag){
        $data = [
            "tagId" => $wikiTag->__get("tag")->__get("tagId"),
            "wikiId" => $wikiTag->__get("wiki")->__get("wikiId"),
        ];
        $this->insertTag($data);
    }
}