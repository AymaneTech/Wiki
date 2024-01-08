<?php

namespace App\Models\Services;
use App\Models\entities\CategoryEntity;
use App\Models\entities\UserEntity;
use App\Models\entities\WikiEntity;
use App\Models\repositories\WikiRepository;

class WikiService
{
    private $wikiRepository;
    public function __construct(){
        $this->wikiRepository = new WikiRepository();
    }
    public function saveWiki($wiki){
        extract($wiki);
        $categoryEntity = new CategoryEntity();
        $authorEntity = new UserEntity();
        $categoryEntity->__set("categoryId", $category);
        $authorEntity->__set("userId", $authorId);
        $wikiEntity = new WikiEntity($wikiTitle, $wikiDescription, $wikiContent, $image, $categoryEntity, $authorEntity);
        $this->wikiRepository->saveWiki($wikiEntity);
    }

}