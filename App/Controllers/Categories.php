<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Helpers\Input;
use App\Helpers\Functions;
class Categories extends Controller
{
    private $categoryService;
    public function __construct(){
        $this->categoryService = $this->model("CategoryService");
    }
    public function index(){

        $data = $this->categoryService->getCategories();
        $this->view("Category/index", $data);
    }
    public function create (){
        $this->view("Category/create");
    }
    public function save(){
        if(isset($_POST["saveCategory"])){
            $result = Input::filterInput($_POST, $_FILES["categoryImage"]);
            if(!empty($result[0])){
                $this->view("Category/create", $result[0]);
                exit();
            }
            $this->categoryService->saveCategory($result);
            header("Location: ". APP_URL."categories");
//            $this->index();
        }
    }
}