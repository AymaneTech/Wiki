<?php

namespace App\Controllers;

use App\Core\Controller;

class Wikis extends Controller
{
    private $wikiService;

    public function __construct()
    {
        $this->wikiService = $this->model('WikiService');
    }

    public function index()
    {
        $categories = $this->model('CategoryService');
        $tags = $this->model('TagService');
        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories()];
        $this->view("Workspace/wikis/create", $data);
    }

    public function create()
    {
        $categories = $this->model('CategoryService');
        $tags = $this->model('TagService');
        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories()];
        $this->view("Workspace/wikis/create", $data);
    }

    public function save()
    {
        if (isset($_POST["postRequest"])) {
            $tags = $_POST["tags"];
            $_POST["authorId"] = user_session("userId");
            unset($_POST["tags"]);
            $result = filterInput($_POST, $_FILES["image"]);
            if(!empty($result[0])){
                $this->view("Workspace/wikis/create", $result);
                exit();
            }
            $this->wikiService->saveWiki($result);
            $this->view("Workspace/index");
        }
    }

}