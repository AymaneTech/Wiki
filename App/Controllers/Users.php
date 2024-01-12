<?php

namespace App\Controllers;

use App\Models\Services\userService;
use App\Helpers\Functions as f;
use App\Helpers\Input;
class Users extends \App\Core\Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = $this->service("userService");
    }

    public function login()
    {
        $this->view("Auth/login");
        if (isset($_POST["postRequest"])) {
            $result = filterInput($_POST);
            $user = $this->userService->login($result["data"]);
            if (!is_object($user) && isset($_SESSION["error"])) {
                $this->view("Auth/login");
            } else {
                unset($_SESSION["error"]);
                echo "<script>window.location.replace('http://localhost/wiki/home')</script>";
            }
        }
    }

    public function register()
    {
        $this->view("Auth/register");
        if (isset($_POST["postRequest"])) {
            if (isset($_FILES) && $_FILES["image"]["size"] > 0) {
                $result = filterInput($_POST);
                $image = getImage($_FILES["image"]);
                if (empty($image["errors"])) {
                    $result["data"]["image"] = $image["name"];
                }
            }
            $checkEmail = checkEmail($result["data"]["email"]);
            $checkPassword = checkPasswords($result["data"]["password"], $result["data"]["confirmPassword"]);
            if (!$checkPassword || !$checkEmail) {
                $this->view("Auth/register", $result);
                exit();
            }
            unset($result["data"]["passwordConfirm"]);
            $result["data"]["password"] = password_hash($result["data"]["password"], PASSWORD_BCRYPT);
            $this->userService->register($result["data"]);
            unset($_SESSION["error"]);
            echo "<script>window.location.replace('http://localhost/wiki/users/login')</script>";
        }
    }
    public function logout(){
        logout();
    }
}