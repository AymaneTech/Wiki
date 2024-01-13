<?php

namespace App\Controllers;
use App\Core\Controller;

class Dashboard extends Controller
{
    private $userService;
    private $wikiService;
    private $categoryService;

    public function __construct(){
        $this->userService = $this->service("UserService");
        $this->wikiService = $this->service("WikiService");
        $this->categoryService = $this->service("CategoryService");
    }
    public function index(){
        $users = $this->userService->getUsers();
        $wikis = $this->wikiService->getWikis();
        $userStatistics = $this->userService->usersCount();
        $wikiStatistics = $this->wikiService->wikisCount();
        $data =  [
            "users" => $users, "wikis" => $wikis,
            "categoryCount" =>  $this->categoryService->categoriesCount(),
            "userCount" => $this->userService->usersCount(),
            "wikiCount" => $this->wikiService->wikisCount()
        ];
        $this->view("Admin/index", $data);
    }

}