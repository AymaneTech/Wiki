<?php

namespace App\Controllers;

use App\Core\Controller;

class Tags extends Controller
{
    private $tagService;

    public function __construct()
    {
        $this->tagService = $this->service("TagService");
    }

    public function index()
    {
        $data[0] = $this->tagService->getTags();
        $this->view("Admin/Tag/index", $data);
    }

    public function create()
    {
        if (isset($_POST["postRequest"])) {
            $result = filterInput($_POST);
            $this->tagService->saveTag($result["data"]);
            redirect("Tags");
        }
    }

    public function delete()
    {
        $this->tagService->deleteTag(post("deleteId"));
        redirect("tags");
    }
    public function edit()
    {
            $data[0] = $this->tagService->getTags();
            $data[1] = $this->tagService->findById(post("editId"));
            $this->view("Admin/Tag/index", $data);
    }
    public function update()
    {
        if (isset($_POST["postRequest"])) {
            $result = filterInput($_POST);
            $this->tagService->updateTag($result["data"]);
            redirect("tags");
        }
    }
}