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
        $data = $this->tagService->getTags();
//        Functions::dd($data);
        $this->view("Tag/index", $data);
    }
    public function create (){
        if(isset($_POST["postRequest"])){
            $result = Input::filterInput($_POST);
            $this->tagService->saveTag($result);
            header("Location: " . APP_URL . "Tags");
        }
    }
}