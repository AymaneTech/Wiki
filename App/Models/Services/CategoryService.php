<?php

namespace App\Models\Services;
use App\Models\entities\CategoryEntity;
use App\Models\repositories\Category;
use App\Helpers\Functions;
class CategoryService
{
    private $category;
    public function __construct(){
        $this->category = new Category();
    }
    public function saveCategory($category){
        $categoryEntity = new CategoryEntity($category["categoryName"], $category["categoryDescription"], $category["categoryImage"]);
        $this->category->saveCategory($categoryEntity);
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

}