<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Models\Services\WikiService;
class SingleWiki extends Controller
{
    private $wikiService;
    public function __construct (){
        $this->wikiService = $this->model("wikiService");
    }
    public function index($wikiId){
        $singleWiki = $this->wikiService->getSingleWiki($wikiId);
        $this->view("home/wikis/singleWiki", ["wiki" => $singleWiki]);
    }
}