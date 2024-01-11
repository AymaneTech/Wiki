<?php

namespace App\Controllers;

class Home extends \App\Core\Controller
{
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
}
