<?php

namespace App\Models\Services;

use App\Models\entities\CategoryEntity;
use App\Models\entities\TagEntity;
use App\Models\entities\UserEntity;
use App\Models\entities\WikiEntity;
use App\Models\entities\wikiTagEntity;
use App\Models\repositories\CategoryRepository;
use App\Models\repositories\UserRepository;
use App\Models\repositories\WikiRepository;

class WikiService
{
    private $wikiRepository;
    private $wikiTagService;
    public function __construct()
    {
        $this->wikiRepository = new WikiRepository();
        $this->wikiTagService = new WikiTagService();
    }

    public function getWikis(): array
    {
        $array = [];
        $wikis = $this->wikiRepository->getAllWikis();
        foreach ($wikis as $wiki) {
            $categoryEntity = new CategoryEntity();
            $authorEntity = new UserEntity();
            $categoryEntity->__set("categoryId", $wiki->categoryId);
            $authorEntity->__set("userId", $wiki->authorId);
            $category = $this->fillCategoryEntity($categoryEntity);
            $author = $this->fillAuthorEntity($authorEntity);
            $wikiEntity = new WikiEntity($wiki->wikiTitle, $wiki->wikiDescription, $wiki->wikiContent, $wiki->wikiImage, $wiki->createdAt, $wiki->wikiId);
            $wikiEntity->__set("isArchived", $wiki->isArchived);
            $wikiEntity->__set("category", $category);
            $wikiEntity->__set("author", $author);
            $array[] = $wikiEntity;
        }
        return $array;
    }

    public function getPagination($pagination): array
    {
        $array = [];
        $wikis = $this->wikiRepository->getPaginationWikis($pagination);
        foreach ($wikis as $wiki) {
            $categoryEntity = new CategoryEntity();
            $authorEntity = new UserEntity();

            $array = $this->getArray($categoryEntity, $wiki, $authorEntity, $array);
        }
        return $array;
    }
    public function search($searchValue){
        $array = [];
        $wikiEntity = new WikiEntity($searchValue);
        $wikiEntity->__set("wikiTitle", $searchValue);
        $result =  $this->wikiRepository->search($wikiEntity);
        foreach($result as $wiki){
            $categoryEntity = new CategoryEntity();
            $authorEntity = new UserEntity();
            $array = $this->getArray($categoryEntity, $wiki, $authorEntity, $array);
        }
        return $array;
    }

    public function getAuthorWikis($userId): array
    {
        $userEntity = new UserEntity();
        $userEntity->__set("userId", $userId);
        $array = [];
        $wikis = $this->wikiRepository->getAuthorWikis($userEntity);
        foreach ($wikis as $wiki) {
            $categoryEntity = new CategoryEntity();
            $authorEntity = new UserEntity();
            $array = $this->getArray($categoryEntity, $wiki, $authorEntity, $array);
        }
        return $array;
    }

    public function getSingleWiki($wikiId)
    {
        $wikiEntity = new WikiEntity();
        $wikiEntity->__set("wikiId", $wikiId);
        $result = $this->wikiRepository->getSingleWiki($wikiEntity);
        $categoryEntity = new CategoryEntity();
        $authorEntity = new UserEntity();
        $singleWikiEntity = $this->getEntity($categoryEntity, $result, $authorEntity);
        $allWikiTags = $this->wikiTagService->getWikiTags($singleWikiEntity->__get("wikiId"));
        return ["wiki" => $singleWikiEntity, "wikiTags" => $allWikiTags];
    }

    public function saveWiki($wiki)
    {
        extract($wiki);
        $categoryEntity = new CategoryEntity();
        $authorEntity = new UserEntity();
        $categoryEntity->__set("categoryId", $category);
        $authorEntity->__set("userId", $authorId);
        $wikiEntity = new WikiEntity($wikiTitle, $wikiDescription, $wikiContent, $image);
        $wikiEntity->__set("category", $categoryEntity);
        $wikiEntity->__set("author", $authorEntity);
        return $this->wikiRepository->saveWiki($wikiEntity);
    }

    public function deleteWiki($id)
    {
        $wikiEntity = new WikiEntity();
        $wikiEntity->__set("wikiId", $id);
        $this->wikiRepository->deleteWiki($wikiEntity);
    }

    public function editWiki($id)
    {
        $wikiEntity = new WikiEntity();
        $wikiEntity->__set("wikiId", $id);
        $result = $this->wikiRepository->editWiki($wikiEntity);
        return new WikiEntity($result->wikiTitle, $result->wikiDescription, $result->wikiContent, $result->wikiImage, $result->createdAt, $result->wikiId);
    }

    public function updateWiki($data)
    {
        extract($data);
        $updatedAt = date("Y-m-d H:i:s");
        $wikiEntity = new WikiEntity($wikiTitle, $wikiDescription, $wikiContent, $image);
        $wikiEntity->__set("wikiId", $wikiId);
        $wikiEntity->__set("updatedAt", $updatedAt);
        $this->wikiRepository->updateWiki($wikiEntity);
    }

    public function findById($id): array
    {
        $array = [];
        $wikis = $this->wikiRepository->findByColumn("tagId", $id);
        foreach ($wikis as $wiki) {
            $wikiEntity = new WikiEntity($wiki->wikiTitle, $wiki->wikiDescription, $wiki->wikiContent, $wiki->wikiImage, $wiki->wikiId);
            $array[] = $wikiEntity;
        }
        return $array;
    }

    public function findByCategory($categoryId)
    {
        $categoryEntity = new CategoryEntity();
        $categoryEntity->__set("categoryId", $categoryId);
        $array = [];
        $categoryWikis = $this->wikiRepository->findByColumn("categoryId", $categoryId);
        foreach ($categoryWikis as $wiki) {
            $categoryEntity = new CategoryEntity();
            $authorEntity = new UserEntity();
            $array = $this->getArray($categoryEntity, $wiki, $authorEntity, $array);
        }
        return $array;
    }


    public function archiveWiki($id)
    {
        $wikiEntity = new WikiEntity();
        $wikiEntity->__set("wikiId", $id);
        $this->wikiRepository->archiveWiki($wikiEntity);
    }

    public function removeWikiFromArchive($id)
    {
        $wikiEntity = new WikiEntity();
        $wikiEntity->__set("wikiId", $id);
        $this->wikiRepository->removeWikiFromArchive($wikiEntity);
    }
    public function fillCategoryEntity($categoryEntity)
    {
        $categoryRepository = new CategoryRepository();
        $result2 = $categoryRepository->findById($categoryEntity);
        $categoryEntity->__set("categoryName", $result2->categoryName);
        $categoryEntity->__set("categoryDescription", $result2->categoryDescription);
        $categoryEntity->__set("categoryImage", $result2->categoryImage);
        return $categoryEntity;
    }

    public function fillAuthorEntity($authorEntity)
    {
        $authorRepository = new UserRepository();
        $result = $authorRepository->findById($authorEntity);
        $authorEntity->__set("username", $result->username);
        $authorEntity->__set("email", $result->email);
        $authorEntity->__set("userImage", $result->userImage);
        return $authorEntity;
    }
    public function getArray(CategoryEntity $categoryEntity, $wiki, UserEntity $authorEntity, array $array): array
    {
        $wikiEntity = $this->getEntity($categoryEntity, $wiki, $authorEntity);
        $array[] = $wikiEntity;
        return $array;
    }

    public function getEntity(CategoryEntity $categoryEntity, $wiki, UserEntity $authorEntity): WikiEntity
    {
        $categoryEntity->__set("categoryId", $wiki->categoryId);
        $authorEntity->__set("userId", $wiki->authorId);
        $category = $this->fillCategoryEntity($categoryEntity);
        $author = $this->fillAuthorEntity($authorEntity);

        $wikiEntity = new WikiEntity($wiki->wikiTitle, $wiki->wikiDescription, $wiki->wikiContent, $wiki->wikiImage, $wiki->createdAt, $wiki->wikiId);
        $wikiEntity->__set("category", $category);
        $wikiEntity->__set("author", $author);
        return $wikiEntity;
    }
}
