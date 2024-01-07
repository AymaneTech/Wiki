<?php

namespace App\Helpers;

class Input
{
    public static function getImage($file)
    {
        $tmp = $file["tmp_name"];
        return file_get_contents($tmp);
    }

    public static function filterInput($post, $file)
    {
        $errors = [];
        $data = [];
        unset($_POST["postCategory"]);
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $errors[] = $key . ' is required';
            } else {
                $value = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
                $data[$key] = $value;
            }
        }
        $data["categoryImage"] = self::getImage($file);
        if (!empty($errors)) {
            return $errors;
        }
        return $data;
    }

}