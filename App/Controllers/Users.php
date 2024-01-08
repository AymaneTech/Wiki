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
        $this->view("Auth/register");
        if(isset($_POST["postRequest"])){
            $result = Input::filterInput($_POST, $_FILES["image"]);
            if (!empty($result[0])) {
                $this->view("Auth/register", $result);
                exit();
            }
            $checkPassword = Input::checkPasswords($result["password"], $result["confirmPassword"]);
            if(!$checkPassword){
                $this->view("Auth/register", $result);
                exit();
            }
            unset($result["passwordConfirm"]);
            $result["password"] = password_hash($result["password"], PASSWORD_BCRYPT);
            $this->userService->register($result);
        }
    }
}