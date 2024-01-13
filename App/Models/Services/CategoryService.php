<?php

namespace App\Models\Services;

use App\Models\entities\CategoryEntity;
use App\Models\repositories\CategoryRepository;
use App\Helpers\Functions;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function saveCategory($category)
    {
        $categoryEntity = new CategoryEntity($category["categoryName"], $category["categoryDescription"], $category["image"]);
        $this->categoryRepository->saveCategory($categoryEntity);
    }

    public function updateCategory($category)
    {
        $categoryEntity = new CategoryEntity($category["categoryName"], $category["categoryDescription"], $category["image"], $category["categoryId"]);
        $this->categoryRepository->updateCategory($categoryEntity);
    }

    public function getCategories()
    {
        $array = [];
        $categories = $this->categoryRepository->getAllCategories();
        foreach ($categories as $category) {
            $categoryEntity = new CategoryEntity($category->categoryName, $category->categoryDescription, $category->categoryImage, $category->categoryId);
            $array[] = $categoryEntity;
        }
        return $array;
    }

    public function deleteCategory($id)
    {
        $categoryEntity = new categoryEntity();
        $categoryEntity->__set("categoryId", $id);
        $this->categoryRepository->deleteCategory($categoryEntity);
    }

    public function findById($id)
    {
        $categoryEntity = new categoryEntity();
        $categoryEntity->__set("categoryId", $id);
        $result = $this->categoryRepository->findById($categoryEntity);
        return new categoryEntity($result->categoryName, $result->categoryDescription, $result->categoryImage, $result->categoryId);
    }

    public function search ($searchValue){
        $array = [];
        $categoryEntity = new CategoryEntity($searchValue);
        $result =  $this->categoryRepository->search($categoryEntity);
        foreach($result as $category){
            $categoryEntity = new CategoryEntity($category->categoryName, $category->categoryDescription, $category->categoryImage, $category->categoryId);
            $array[] = $categoryEntity;
        }
        return $array;
    }
    public function categoriesCount(){
        $categoryCount = $this->categoryRepository->categoriesCount();
        return $categoryCount->count;
    }


}