<?php

namespace App\Models\repositories;

use App\Models\Entities\UserEntity;
use App\Helpers\Functions as f;

class UserRepository extends \App\Core\Model
{
    public function __construct()
    {
        parent::__construct("users");
    }

    public function register(UserEntity $user)
    {
        $data = ["username" => $user->__get('username'), "email" => $user->__get('email'), "password" => $user->__get('password'), "userImage" => $user->__get('userImage'), "role" => $user->__get('role')];
        $this->save($data);
    }
    public function login(UserEntity $user)
    {
        $data = ["email" => $user->__get('email'), "password" => $user->__get('password')];
        $result = $this->findByColumn("email", $data["email"]);
        if (count($result) > 0) {
            $user = $result[0];
            if (password_verify($data["password"], $user->password)) {
                return $user;
            }
        }
    }

    public function findById(UserEntity $authorEntity)
    {
        $id = $authorEntity->__get("userId");
        $result = $this->findByColumn("userId", $id);
        return $result[0];
    }
}