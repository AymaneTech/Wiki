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
        $data = ["wikiTitle" => $wikiEntity->__get("wikiTitle"),
            "wikiDescription" => $wikiEntity->__get("wikiDescription"),
            "wikiContent" => $wikiEntity->__get("wikiContent"),
            "wikiImage" => $wikiEntity->__get("wikiImage"),
            "categoryId" => $wikiEntity->__get("category")->__get("categoryId"),
            "authorId" => $wikiEntity->__get("author")->__get("userId"),
            "isArchived" => $wikiEntity->__get("isArchived")
        ];
        $this->save($data);
        return $this->lastInsertId();
    }

    public function getAllWikis()
    {
        return $this->getAll();
    }
    public function getPaginationWikis($pagination){
        return $this->getPagination($pagination);
    }

    public function archiveWiki(WikiEntity $wikiEntity)
    {
        $id = $wikiEntity->__get("wikiId");
        $data = ["isArchived" => 1];
        $condition = ["wikiId" => $id];
        $this->update($data, $condition);
    }
    public function removeWikiFromArchive(WikiEntity $wikiEntity)
    {
        $id = $wikiEntity->__get("wikiId");
        $data = ["isArchived" => 0];
        $condition = ["wikiId" => $id];
        $this->update($data, $condition);
    }

}