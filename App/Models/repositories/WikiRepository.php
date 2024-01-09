<?php

namespace App\Models\repositories;

use App\Models\entities\WikiEntity;

class WikiRepository extends \App\Core\Model
{
    public function __construct()
    {
        parent::__construct("wiki");
    }

    public function saveWiki(WikiEntity $wikiEntity)
    {
//        dd($wikiEntity->__get("author"));
        $data = ["wikiTitle" => $wikiEntity->__get("wikiTitle"),
            "wikiDescription" => $wikiEntity->__get("wikiDescription"),
            "wikiContent" => $wikiEntity->__get("wikiContent"),
            "wikiImage" => $wikiEntity->__get("wikiImage"),
            "categoryId" => $wikiEntity->__get("category")->__get("categoryId"),
            "authorId" => $wikiEntity->__get("author")->__get("userId")
        ];
        $this->save($data);
        return $this->lastInsertId();
    }
}