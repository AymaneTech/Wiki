<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Models\Services\userService;
use App\Models\Services\WikiService;

class Dashboard extends Controller
{
    private $userService;
    private $wikiService;
    public function __construct(){
        $this->userService = $this->service("UserService");
        $this->wikiService = $this->service("WikiService");
    }
    public function index(){
        $users = $this->userService->getUsers();
        $wikis = $this->wikiService->getWikis();
        $this->view("Admin/index", ["users" => $users, "wikis" => $wikis]);
    }
}