<?php

namespace App\Models\repositories;

use App\Core\Model;
use App\Models\Entities\CategoryEntity;

class Category extends Model
{
    public function __construct()
    {
        parent::__construct("category");
    }
    public function saveCategory(CategoryEntity $category)
    {
        $data = [];
        $data["categoryName"] = $category->__get("categoryName");
        $data["categoryDescription"] = $category->__get("categoryDescription");
        $data["categoryImage"] = $category->__get("categoryImage");
        $this->save($data);
    }
}