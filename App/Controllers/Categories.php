<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Input;
use App\Helpers\Functions;

class Categories extends Controller
{
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = $this->model("CategoryService");
    }

    public function index()
    {
        $data = $this->categoryService->getCategories();
        $this->view("Admin/Category/index", $data);
    }

    public function create()
    {
        $this->view("Admin/Category/create");
    }

    public function save()
    {
        if (isset($_POST["postRequest"])) {
            $result = filterInput($_POST, $_FILES["categoryImage"]);
            if (!empty($result[0])) {
                $this->view("Admin/Category/create", $result);
                exit();
            }
            $this->categoryService->saveCategory($result);
            redirect("categories");
        }
    }

    public function edit()
    {
            $data = $this->categoryService->findById(post("editId"));
            $this->view("Admin/Category/edit", $data);
    }

    public function update()
    {
        if (isset($_POST["postRequest"])) {
            $file = $_FILES['categoryImage'] ?? null;
            $result = filterInput($_POST, $_FILES["categoryImage"]);
            if (!empty($result["errors"])) {
                $this->view("Admin/Category/edit", $result);
                exit();
            }
            $this->categoryService->updateCategory($result);
            redirect("categories");

        }
    }

    public function delete()
    {
            $this->categoryService->deleteCategory(post("deleteId"));
            redirect("categories");
    }
}