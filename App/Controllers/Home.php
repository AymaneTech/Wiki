<?php

namespace App\Controllers;
class Home extends \App\Core\Controller
{
    private $wikiService;
    private $categoryService;

    public function __construct()
    {
        $this->wikiService = $this->service('WikiService');
        $this->categoryService = $this->service('CategoryService');
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
        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories(), "wikis" => $allwikis, "latestWikis" => $wikis->getLatestWikis(), "randomCategories" => $randomCategories];
        $this->view("home/index", $data);
    }

    public function search()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $wikis = $this->wikiService->search($data["value"]);
        $categories = $this->categoryService->search($data["value"]);
        echo searchResult($wikis, $categories);

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
            $tags = $_POST["tags"] ?? "";
            unset($_POST["tags"]);
            $_POST["authorId"] = user_session("userId");
            if (empty($_FILES["image"])) {
                redirect("home/create");
            } else {
                $result = filterInput($_POST);
                $image = getImage($_FILES["image"]);
                if (empty($image["errors"])) {
                    $result["data"]["image"] = $image["name"];
                } else {
                    redirect("home/create");
                }
            }
            if (!empty($result["errors"])) {
                redirect("home/create");
            }
            $lastInsertedId = $this->wikiService->saveWiki($result["data"]);
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
