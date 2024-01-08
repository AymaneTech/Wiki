<?php
namespace App\Controllers;
class Author extends \App\Core\Controller
{
    public function index(){
        $this->view("workspace/index");
    }

}