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
    public function manageWiki ($id = 1){
        $categories = $this->model('CategoryService');
        $tags = $this->model('TagService');
        if($id > 1){
            $result = $this->wikiService->getWikis($id);
        }else {
            $result = $this->wikiService->getWikis(1);
        }
        $data = ["wikis" => $result];
        $this->view("admin/wiki/manageWiki", $data);
    }
    public function archive (){
        if(isset($_POST["archivedId"])){
            $this->wikiService->archiveWiki($_POST["id"]);
            $this->manageWiki();
        }else if(isset($_POST["desarchivedId"])){
            $this->wikiService->removeWikiFromArchive($_POST["id"]);
            $this->manageWiki();
        }
    }
    public function delete(){
            $this->wikiService->deleteWiki(post("deleteId"));
           echo "<script>window.location.replace('http://localhost/wiki/home/authorDashboard')</script>";
    }
    public function edit($id){
        $categories = $this->model('CategoryService');
        $tags = $this->model('TagService');
        $data = ["tags" => $tags->getTags(), "categories" => $categories->getCategories(), "wiki" => $this->wikiService->editWiki($id)];
        $this->view("home/wikis/edit", $data);
    }
    public function update(){
        if(isset($_POST["postRequest"])){
            $result = filterInput($_POST, $_FILES["image"]);
            if (!empty($result[0])) {
                $this->view("home/authorDashboard", $result);
                exit();
            }
            $this->wikiService->updateWiki($result);
            redirect("home/authorDashboard");
        }
    }
    public function category($categoryId){
        $result = $this->wikiService->findByCategory($categoryId);
        $data = ["wikis"=> $result];
        $this->view("home/singleCategory", $data);
    }
}