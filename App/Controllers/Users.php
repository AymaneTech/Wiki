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
        $this->userService = $this->model("userService");
    }

    public function login()
    {
        $this->view("Auth/login");
        if (isset($_POST["postRequest"])) {
            $result = filterInput($_POST);
            $user = $this->userService->login($result);
            if (!is_object($user) && isset($_SESSION["error"])) {
                $this->view("Auth/login");
            } else {
                echo "<script>window.location.replace('http://localhost/wiki/authors')</script>";
            }
        }
    }

    public function register()
    {
        $this->view("Auth/register");
        if (isset($_POST["postRequest"])) {
            if (isset($_FILES) && $_FILES["image"]["size"] > 0) {
                $result = filterInput($_POST, $_FILES["image"]);
            } else {
                $result = filterInput($_POST);
            }
            if (!empty($result[0])) {
                $this->view("Auth/register", $result);
                exit();
            }
            $email = checkEmail($result["email"]);
            $checkPassword = checkPasswords($result["password"], $result["confirmPassword"]);
            if (!$checkPassword) {
                $this->view("Auth/register", $result);
                exit();
            }
            unset($result["passwordConfirm"]);
            $result["password"] = password_hash($result["password"], PASSWORD_BCRYPT);
            $this->userService->register($result);
            echo "<script>window.location.replace('http://localhost/wiki/users/login')</script>";
        }
    }
}