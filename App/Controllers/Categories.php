<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Helpers\Input;
use App\Helpers\Functions;
class Categories extends Controller
{
    public function index(){
        $this->view("Category/index");
    }
    public function create (){
        $this->view("Category/create");
    }
    public function save(){
        if(isset($_POST["saveCategory"])){
            $result = Input::filterInput($_POST, $_FILES["categoryImage"]);
            if(!empty($result[0])){
                $this->view("Category/create", $result[0]);
            }
            $categoryService = $this->model("CategoryService");
            $categoryService->saveCategory($result);
            header("Location: ". APP_URL."categories");
//            $this->index();
        }
    }
}