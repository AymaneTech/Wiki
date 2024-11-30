<?php

namespace App\Models\repositories;

use App\Core\Model;
use App\Models\Entities\CategoryEntity;
use PDOException;

class CategoryRepository extends Model
{
    public function __construct()
    {
        parent::__construct("category");
    }

    public function getAllCategories()
    {
        return $this->getAll();
    }

    public function saveCategory(CategoryEntity $category)
    {
        $data = [];
        $data["categoryName"] = $category->__get("categoryName");
        $data["categoryDescription"] = $category->__get("categoryDescription");
        $data["categoryImage"] = $category->__get("categoryImage");
        $this->save($data);
    }

    public function findById(CategoryEntity $category)
    {
        $id = $category->__get("categoryId");
        return $this->findOneByColumn("categoryId", $id);

    }

    public function updateCategory(CategoryEntity $category)
    {
        $condition = ["categoryId" => $category->__get("categoryId")];

        $data = ["categoryName" => $category->__get("categoryName"),
            "categoryDescription" => $category->__get("categoryDescription"),
            "categoryImage" => $category->__get("categoryImage"),
        ];
        $this->update($data, $condition);
    }

    public function deleteCategory(CategoryEntity $category)
    {
        $id = $category->__get("categoryId");
        $this->delete("categoryId", $id);
    }

    public function search(CategoryEntity $categoryEntity)
    {
        $searchValue = $categoryEntity->__get("categoryName");
        return $this->searchByColumn("categoryName", $searchValue);
    }

    public function categoriesCount()
    {
        return $this->count();
    }
}