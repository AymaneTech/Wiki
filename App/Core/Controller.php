<?php

namespace App\Core;
class Controller
{
    public function model($model)
    {
        $modelClass = 'App\\Models\\services\\' . $model;
        if (class_exists($modelClass)) {
            return new $modelClass();
        } else {
            die ("no model class defined with this name");
        }
    }
    public function view($view, $data = [])
    {
        require_once '../App/Views/' . $view . '.php';
    }
}