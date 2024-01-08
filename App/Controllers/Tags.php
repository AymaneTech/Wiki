<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Helpers\Functions;
use App\Helpers\Input;
class Tags extends Controller
{
    private $tagService;

    public function __construct()
    {
        $this->tagService = $this->model("TagService");
    }
    public function index(){
        $data[0] = $this->tagService->getTags();
        $this->view("Tag/index", $data);
    }
    public function create (){
        if(isset($_POST["postRequest"])){
            $result = Input::filterInput($_POST);
            $this->tagService->saveTag($result);
            header("Location: " . APP_URL . "Tags");
        }
    }
    public function delete(){
        if (isset($_POST["deleteId"])) {
            $this->tagService->deleteTag($_POST["deleteId"]);
            header("Location: " . APP_URL . "tags");
        }
    }
    public function edit(){
        if (isset($_POST["editId"])) {
            $data[0] = $this->tagService->getTags();
            $data[1] = $this->tagService->findById($_POST["editId"]);
//            Functions::dd($data);
            $this->view("Tag/index", $data);
        }
    }
    public function update(){
        if(isset($_POST["postRequest"])){
            $result = Input::filterInput($_POST);
            $this->tagService->updateTag($result);
            header("Location: " . APP_URL . "tags");
        }
    }
}