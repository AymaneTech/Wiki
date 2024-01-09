<?php

function dd($var)
{
    echo "<br>";
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    echo "<br>";
    die();
}

function checkEmail($email): bool
{
    return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
}

function checkPasswords($password, $passwordConfirmation): bool
{
    if ($password === $passwordConfirmation) {
        return true;
    } else {
        return false;
    }
}

function getImage($file)
{
    $tmp = $file["tmp_name"];
    return file_get_contents($tmp);
}

function filterInput($post, $file = null)
{
    $errors = [];
    $data = [];
    unset($_POST["postRequest"]);
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $data["tags"] = $value;
        }
        if (empty($value)) {
            $errors[] = $key . ' is required';
        } else {
            $value = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
            $data[$key] = $value;
        }
    }
    if (!($file == null)) {
        $data["image"] = getImage($file);
    }
    if (!empty($errors)) {
        return $errors;
    }
    return $data;
}

function loop($data)
{
    foreach ($data as $item) {
        echo "<br>";
        echo "<pre>";
        var_dump($item);
        echo "</pre>";
        echo "<br>";
    }
    die();
}

function user_session($var)
{
    if (isset($_SESSION["user"])) { return $_SESSION["user"]->$var; }
    else { header("Location: http://localhost/wiki/Users/login") ;}
}
function error ($message){
    echo "<br> 
           <strong style='color:red; font-weight:bold; font-size: 20px;' class='font-bold'>Error:  {$message}</strong>
           <br> <br>";
    die("program stoped");
}