<?php
namespace App\Controllers;
class Test extends \App\Core\Controller
{
    public function index(){
        $this->view("Test/index");
    }
}