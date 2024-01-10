<?php
namespace App\Controllers;
error_reporting(E_ALL ^ E_WARNING);
class Workspace extends \App\Core\Controller
{
    private $wikiService;
    public function __construct(){
        $this->wikiService = $this->model('WikiService');
    }
    public function index($id = 0){
        $categories = $this->model('CategoryService');
        $tags = $this->model('TagService');
        $wikis = $this->model('WikiService');
        $allwikis = $wikis->getPagination(1);
        if($id !== 0){
            $allwikis = $wikis->getPagination($id);
        }
        $randomCategories = $categories->getCategories();
        shuffle($randomCategories);
        $randomCategories = array_slice($randomCategories, 0, 3);
        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories(), "wikis" => $allwikis, "randomCategories" => $randomCategories];
        $this->view("workspace/index", $data);
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
            unset($_POST["tags"]);
            $_POST["authorId"] = user_session("userId");
            $result = filterInput($_POST, $_FILES["image"]);
            if (!empty($result[0])) {
                $this->view("Workspace/wikis/create", $result);
                exit();
            }
            $lastInsertedId = $this->wikiService->saveWiki($result);
            $wikiTagService = $this->model("wikiTagService");
            $wikiTag = ["wikiId" => $lastInsertedId, "tagsArray" => $tags];
            $wikiTagService->saveWikiTag($wikiTag);
            echo "<script>window.location.replace('http://localhost/wiki/authors')</script>";
        }
    }
    public function authorDashboard(){
        $this->view("Workspace/wikis/Dashboard");
    }

}