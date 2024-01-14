<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Services\WikiService;

class SingleWiki extends Controller
{
    private $wikiService;

    public function __construct()
    {
        $this->wikiService = $this->service("wikiService");
    }

    public function index($wikiId = null)
    {
        if($wikiId == null){
            redirect("home");
        }
        $singleWiki = $this->wikiService->getSingleWiki($wikiId);
        extract($singleWiki, EXTR_SKIP);
        $this->view("home/wikis/singleWiki", ["wiki" => $wiki, "wikiTags" => $wikiTags]);
    }
}