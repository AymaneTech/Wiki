<?php

namespace App\Controllers;

class Home extends \App\Core\Controller
{
    private $wikiService;
    public function __construct(){
        $this->wikiService = $this->model('WikiService');
    }
    public function index($id = 0)
    {
        $categories = $this->model('CategoryService');
        $tags = $this->model('TagService');
        $wikis = $this->model('WikiService');
        $allwikis = $wikis->getPagination(1);
        if ($id !== 0) {
            $allwikis = $wikis->getPagination($id);
        }
        $randomCategories = $categories->getCategories();
        shuffle($randomCategories);
        $randomCategories = array_slice($randomCategories, 0, 3);
        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories(), "wikis" => $allwikis, "randomCategories" => $randomCategories];
        $this->view("home/index", $data);
    }
    public function create()
    {
        $categories = $this->model('CategoryService');
        $tags = $this->model('TagService');
        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories()];
        $this->view("home/wikis/create", $data);
    }
    public function save()
    {
        if (isset($_POST["postRequest"])) {
            if(isset($_POST["tags"])){
                $tags = $_POST["tags"];
            }
            unset($_POST["tags"]);
            $_POST["authorId"] = user_session("userId");
            $result = filterInput($_POST, $_FILES["image"]);
            if (!empty($result[0])) {
                $this->view("home/wikis/create", $result);
                exit();
            }
            $lastInsertedId = $this->wikiService->saveWiki($result);
            $wikiTagService = $this->model("wikiTagService");
            $wikiTag = ["wikiId" => $lastInsertedId, "tagsArray" => $tags];
            $wikiTagService->saveWikiTag($wikiTag);
            echo "<script>window.location.replace('http://localhost/wiki/')</script>";
        }
    }
    public function authorDashboard(){
        $userId =  user_session("userId");
        $wikis = $this->wikiService->getAuthorWIkis($userId);
        $data = ["wikis" => $wikis];
        $this->view("home/wikis/Dashboard", $data);
    }

}
