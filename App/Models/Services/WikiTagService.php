<?php

namespace App\Models\Services;
use App\Models\entities\TagEntity;
use App\Models\entities\WikiEntity;
use App\Models\entities\wikiTagEntity;
use App\Models\repositories\wikiTagRepository;

class WikiTagService
{
    private $wikiTagRepository;
    public function __construct(){
        $this->wikiTagRepository = new wikiTagRepository();
    }
    public function saveWikiTag($wikiTag){
        extract($wikiTag);
        foreach($tagsArray as $tag){
            $tagEntity = new tagEntity();
            $wikiEntity = new wikiEntity();
            $tagEntity->__set("tagId", $tag);
            $wikiEntity->__set("wikiId", $wikiId);
            $tagWikiEntity = new WikiTagEntity($tagEntity, $wikiEntity);
            $this->wikiTagRepository->saveWikiTag($tagWikiEntity);
        }
    }
    public function getWikiTags($wikiId){
        $array = [];
         $result = $this->wikiTagRepository->getWikiTags($wikiId);
         foreach($result as $wikiTag){
             $tagEntity = new tagEntity();
             $wikiEntity = new wikiEntity();
             $wikiEntity->__set("wikiId", $wikiTag->wikiId);
             $tagEntity->__set("tagId", $wikiTag->tagId);
             $tagEntity->__set("tagName", $wikiTag->tagName);

             $wikiTag = new WikiTagEntity($tagEntity, $wikiEntity);
             $array[] = $wikiTag;
         }
         return $array;
    }

}