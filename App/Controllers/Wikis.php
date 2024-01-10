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
        if(isset($_POST["deleteId"])){
            $this->wikiService->deleteWiki($_POST["deleteId"]);
           echo "<script>window.location.replace('http://localhost/wiki/workspace/authorDashboard')</script>";
        }
    }

}