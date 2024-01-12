<?php

namespace App\Models\Services;
USE App\Helpers\Functions as f;
use App\Models\repositories\userRepository;
use App\Models\entities\UserEntity;

class userService
{
    private userRepository $user;

    public function __construct()
    {
        $this->user = new UserRepository();
    }
    public function register($data)
    {
        $userEntity = new UserEntity($data["email"], $data["password"], $data["username"], isset($data["image"])?$data["image"]: null);
        $this->user->register($userEntity);
    }
    public function login($data)
    {
        $userEntity = new UserEntity($data["email"], $data["password"]);
        $result = $this->user->login($userEntity);
        if (!is_object($result) && $result == 0) {
            return $_SESSION['error'] = "There is no account with this email address";
        }
        if (!is_object($result) && $result == 1) {
            return $_SESSION['error'] = "incorrect password";
        }else {
            $_SESSION['user'] = $result;
            return $result;
        }
    }
}