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
        dd("index view for wikis ");
//        $categories = $this->model('CategoryService');
//        $tags = $this->model('TagService');
//        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories()];
//        $this->view("Workspace/wikis/create", $data);
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
            $this->view("Workspace/index");
        }
    }
    public function manageWiki (){
        $result = $this->wikiService->getWikis();
        $data = ["wikis" => $result];
        $this->view("admin/wiki/manageWiki", $data);
    }
    public function archive (){
        if(isset($_POST["archivedId"])){
            $this->wikiService->archiveWiki($_POST["archivedId"]);
            $this->manageWiki();
        }
    }

}