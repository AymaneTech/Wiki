<?php

namespace App\Controllers;
class Home extends \App\Core\Controller
{
    private $wikiService;

    public function __construct()
    {
        $this->wikiService = $this->service('WikiService');
    }

    public function index($id = 0)
    {
        $categories = $this->service('CategoryService');
        $tags = $this->service('TagService');
        $wikis = $this->service('WikiService');
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
    public function search(){
        $result = $this->wikiService->search("clean");

        if (!empty($result)) {
            if ($result === false) {
                var_dump (json_last_error(), json_last_error_msg());
            } else {
                $data = ["wikiSearchResult" => $result];

            }
        } else {
            echo 'no data found';
        }
    }
    public function create()
    {
        $categories = $this->service('CategoryService');
        $tags = $this->service('TagService');
        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories()];
        $this->view("home/wikis/create", $data);
    }

    public function save()
    {
        if (isset($_POST["postRequest"])) {
            if (isset($_POST["tags"])) {
                $tags = $_POST["tags"];
            }
            unset($_POST["tags"]);
            $_POST["authorId"] = user_session("userId");
            if (empty($_FILES["image"])) {
                redirect("home/create");
            }else {
                $result = filterInput($_POST);
                $result["image"] = getImage($_FILES["image"]);
            }
            if (!empty($result[0])) {
                redirect("home/create");
            }
            $lastInsertedId = $this->wikiService->saveWiki($result);
            $wikiTagService = $this->service("wikiTagService");
            $wikiTag = ["wikiId" => $lastInsertedId, "tagsArray" => $tags];
            $wikiTagService->saveWikiTag($wikiTag);
            echo "<script>window.location.replace('http://localhost/wiki/')</script>";
        }
    }

    public function authorDashboard()
    {
        $userId = user_session("userId");
        $wikis = $this->wikiService->getAuthorWIkis($userId);
        $data = ["wikis" => $wikis];
        $this->view("home/wikis/Dashboard", $data);
    }

}
