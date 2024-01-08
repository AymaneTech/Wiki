<?php

namespace App\Controllers;

use App\Core\Controller;
class Wikis extends Controller
{
    public function index()
    {
        $this->view("Admin/Wiki/index");
    }
}