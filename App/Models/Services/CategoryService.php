<?php

namespace App\Models\Services;
use App\Models\entities\CategoryEntity;
use App\Models\repositories\CategoryRepository;
use App\Helpers\Functions;
class CategoryService
{
    private CategoryRepository $category;
    public function __construct(){
        $this->category = new CategoryRepository();
    }
    public function saveCategory($category){
        $categoryEntity = new CategoryEntity($category["categoryName"], $category["categoryDescription"], $category["image"]);
        $this->category->saveCategory($categoryEntity);
    }
    public function updateCategory($category){
        $categoryEntity = new CategoryEntity($category["catwegoryName"], $category["categoryDescription"], $category["image"], $category["categoryId"]);
        $this->category->updateCategory($categoryEntity);
    }
    public function getCategories()
    {
        $array = [];
        $categories = $this->category->getAllCategories();
        foreach($categories as $category){
            $categoryEntity = new CategoryEntity($category->categoryName, $category->categoryDescription, $category->categoryImage, $category->categoryId);
            $array[] = $categoryEntity;
        }
        return $array;
    }
    public function deleteCategory($id){
        $categoryEntity = new categoryEntity();
        $categoryEntity->__set("categoryId", $id);
        $this->category->deleteCategory($categoryEntity);
    }
    public function findById($id){
        $categoryEntity = new categoryEntity();
        $categoryEntity->__set("categoryId", $id);
        return $this->category->findById($categoryEntity);
    }


}