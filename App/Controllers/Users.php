<?php

namespace App\Controllers;
use App\Models\Services\userService;
USE App\Helpers\Functions as f;
USE App\Helpers\Input;

class Users extends \App\Core\Controller
{
    private $userService;
    public function __construct() {
        $this->userService = $this->model("userService");
    }
    public function login(){
        $this->view("Auth/login");
        if(isset($_POST["postRequest"])){
            $result = Input::filterInput($_POST);
            $user = $this->userService->login($result);
            if(isset($_SESSION["error"])){
                $this->view("Auth/login");
            }else {
                $this->view("Home/index");
            }
        }
    }
    public function register(){

    }

}