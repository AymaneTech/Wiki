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
        $this->view("Tag/index");
    }
    public function create (){
        if(isset($_POST["postRequest"])){
            $result = Input::filterInput($_POST);
            $this->tagService->saveTag($result);
            header("Location: " . APP_URL . "Tags");

        }
    }
}