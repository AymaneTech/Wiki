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
        $this->view("Category/index", $data);
    }

    public function create()
    {
        $this->view("Category/create");
    }

    public function save()
    {
        if (isset($_POST["postRequest"])) {
            $result = Input::filterInput($_POST, $_FILES["categoryImage"]);
            if (!empty($result[0])) {
                $this->view("Category/create", $result);
                exit();
            }
            $this->categoryService->saveCategory($result);
            header("Location: " . APP_URL . "categories");
        }
    }
    public function edit()
    {
        if (isset($_POST["editId"])) {
            $data = $this->categoryService->findById($_POST["editId"]);
            $this->view("Category/edit", $data);
        }
    }
    public function update (){
        if(isset($_POST["postRequest"])){
            $result = Input::filterInput($_POST, $_FILES["categoryImage"]);
            if (!empty($result[0])) {
                $this->view("Category/edit", $result);
                exit();
            }
            $this->categoryService->updateCategory($result);
            header("Location: " . APP_URL . "categories");
        }
    }
    public function delete()
    {
        if (isset($_POST["deleteId"])) {
            $this->categoryService->deleteCategory($_POST["deleteId"]);
            header("Location: " . APP_URL . "categories");
        }
    }
}