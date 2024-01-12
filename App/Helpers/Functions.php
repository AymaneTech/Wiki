<?php

function dd($var)
{
    if(isset($var["image"])){
        unset($var["image"]);
    }
    echo "<br>";
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    echo "<br>";
    die();
}
function checkEmail($email): bool  { return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);}
function checkString($string):bool { return (bool)filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);}
function checkPasswords($password, $passwordConfirmation): bool
{
    if ($password === $passwordConfirmation) { return true; }
    else { return false; }
}

function getImage($file)
{
    $tmp = $file["tmp_name"];
    return file_get_contents($tmp);
}

function filterInput($inputData, $file = null): array
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
        echo "<br> <pre>";
        var_dump($item);
        echo "</pre> <br>";
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
function redirect ($location){
    header("Location: ".APP_URL. $location );
}

function verifyPassword($value, $hash):bool { return password_verify($value, $hash); }
function isLoggedIn() :bool { return isset($_SESSION["user"]);}
function logout(){
    session_start();
    session_unset();
    session_destroy();
    redirect("users/login");
}
function checkAuthorPermission(){
    if (!isLoggedIn()){
        redirect("users/login");
    }
}
function trimValue(&$value) { $value = trim($value); }
function post($value){
    if(isset($_POST[$value])){ return $_POST[$value]; }
    else { die($value." is invalid"); }
}
function get($value){
    if(isset($_GET[$value])){ return $_GET[$value]; }
    else { die($value." is invalid"); }
}
function component($file){
    require_once APP_ROOT . "/Views/Components/".$file.".php";
}