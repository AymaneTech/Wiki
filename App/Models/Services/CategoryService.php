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

}