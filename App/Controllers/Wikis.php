<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Services\WikiService;

class Wikis extends Controller
{
    private WikiService $wikiService;
    public function __construct(){
        $this->wikiService = $this->model('WikiService');
    }
    public function index()
    {
        $categories = $this->model('CategoryService');
        $tags = $this->model('TagService');
        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories()];
        $this->view("Workspace/wikis/create", $data);
    }
}