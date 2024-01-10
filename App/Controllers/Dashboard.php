<?php

namespace App\Controllers;
use App\Core\Controller;
class Admins extends Controller
{
    public function index(){
        $this->view("Admin/index");
    }
}