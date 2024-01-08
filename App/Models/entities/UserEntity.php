<?php

namespace App\Models\entities;
class UserEntity
{
    private $userId;
    private $username;
    private $email;
    private $password;
    private $userImage;
    public function __construct($email = "", $password = "", $username = "", $userImage = null, $userId = null){
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->userImage = $userImage;
    }
    public function __get($property){
        if (property_exists($this, $property)) return $this->$property;
        else die ($property . " property does not exist");
    }
    public function __set($property, $value){
        if (property_exists($this, $property)) $this->$property = $value;
        else die ($property . " property does not exist");
    }
}