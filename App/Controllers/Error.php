<?php

namespace App\Controllers;

class Error extends \App\Core\Controller
{
    public function index(){
        $this->view("error/404");
    }
    public function accessDenied(){
        $this->view("error/accessdenied");
    }

}