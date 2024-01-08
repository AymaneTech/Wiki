<?php

namespace App\Controllers;
class Home extends \App\Core\Controller
{
    public function index(){
        $this->view("home/index");
    }
}