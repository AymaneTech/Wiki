<?php

namespace App\Controllers;
use App\Core\Controller;
class Tags extends Controller
{
    public function index(){
        $this->view("TagEntity/index");
    }
}