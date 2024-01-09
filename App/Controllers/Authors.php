<?php
namespace App\Controllers;
class Authors extends \App\Core\Controller
{
    public function index($id = null){
        $categories = $this->model('CategoryService');
        $tags = $this->model('TagService');
        $wikis = $this->model('WikiService');
        $allwikis = $wikis->getWikis();
        if($id !== null){
            $allwikis = $wikis->findById($id);
        }
        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories(), "wikis" => $allwikis];
        $this->view("workspace/index", $data);
    }

}