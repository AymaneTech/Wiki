<?php

namespace App\Helpers;

class Functions
{
    public static function dd($var){
        echo "<br>";
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        echo "<br>";
        die();
    }
}