<?php

function dd($var = "")
{
    if (isset($var["image"])) {
        unset($var["image"]);
    }
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

function checkString($string): bool
{
    return (bool)filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

function checkPasswords($password, $passwordConfirmation): bool
{
    return $password === $passwordConfirmation;
}

function getImage($file): array
{
    $errors = [];
    $allowed_ext = ["jpg", "jpeg", "png"];
    $name = $file["name"];
    $tmp_name = $file["tmp_name"];

    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $filename = "IMG-" . uniqid() . "." . $ext;
    if ($file["size"] > 5000000) {
        $errors[] = "the image cannot be greater than 2MB";
    }
    if (!in_array($ext, $allowed_ext)) {
        $errors[] = "The image can only be of .jpg, .jpeg or .png format";
    }
    if (empty($errors)) {
        move_uploaded_file($file["tmp_name"], STORAGE . $filename);
    }
    return [
        "name" => $filename,
        "errors" => $errors
    ];
}

function filterInput($inputData): array
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
    return [
        "data" => $data,
        "errors" => $errors
    ];
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
    if (isset($_SESSION["user"])) {
        return $_SESSION["user"]->$var;
    } else {
        header("Location: http://localhost/wiki/Users/login");
    }
}

function error($message)
{
    echo "<br> 
           <strong style='margin-left:50px; color:red; font-weight:bold; font-size: 20px;' class='font-bold'>Error:  <?php var_dump($message)?></strong>
           <br> <br>";
    die("program stoped");
}

function redirect($location)
{
    header("Location: " . APP_URL . $location);
    exit();
}

function verifyPassword($value, $hash): bool
{
    return password_verify($value, $hash);
}

function isLoggedIn(): bool
{
    return isset($_SESSION["user"]);
}
function isAdmin():bool
{
    return isset($_SESSION["isAdmin"]);
}
function checkAdminPermission() {
    if(!isset($_SESSION["isAdmin"])){
        redirect("error/accessDenied");
    }
}

function logout()
{
    session_start();
    session_unset();
    session_destroy();
    redirect("users/login");
}

function checkAuthorPermission()
{
    if (!isLoggedIn()) {
        redirect("users/login");
    }
}

function trimValue(&$value)
{
    $value = trim($value);
}

function post($value)
{
    if (isset($_POST[$value])) {
        return $_POST[$value];
    } else {
        die($value . " is invalid");
    }
}

function get($value)
{
    if (isset($_GET[$value])) {
        return $_GET[$value];
    } else {
        die($value . " is invalid");
    }
}

function component($file)
{
    require_once APP_ROOT . "/Views/Components/" . $file . ".php";
}

// arrayes for search results
function wikisArray($wikis)
{
    $array = [];
    foreach ($wikis as $wiki) {
        $wiki = [
            "wikiId" => $wiki->__get("wikiId"),
            "wikiTitle" => $wiki->__get("wikiTitle"),
            "wikiDescription" => $wiki->__get("wikiDescription"),
            "wikiContent" => $wiki->__get("wikiContent"),
            "wikiImage" => $wiki->__get("wikiImage"),
            "category" => [
                "categoryId" => $wiki->__get("category")->__get("categoryId"),
                "categoryName" => $wiki->__get("category")->__get("categoryName"),
                "categoryDescription" => $wiki->__get("category")->__get("categoryDescription"),
                "categoryImage" => $wiki->__get("category")->__get("categoryImage"),
            ],
            "author" => [
                "userId" => $wiki->__get("author")->__get("userId"),
                "username" => $wiki->__get("author")->__get("username"),
                "email" => $wiki->__get("author")->__get("email"),
                "password" => $wiki->__get("author")->__get("password"),
                "userImage" => $wiki->__get("author")->__get("userImage")
            ]
        ];
        $array[] = $wiki;
    }
    return $array;
}
function categoriesArray($categories)
{
    $array = [];
    foreach ($categories as $category) {
        $category = [
            "categoryId" => $category->__get("categoryId"),
            "categoryName" => $category->__get("categoryName"),
            "categoryDescription" => $category->__get("categoryDescription"),
            "categoryImage" => $category->__get("categoryImage"),
        ];
        $array[] = $category;
    }
    return $array;
}

function searchResult ($wikis, $categories){
    $wikisArray = wikisArray($wikis);
    $categoriesArray = categoriesArray($categories);
    return json_encode ([
        $wikisArray,
        $categoriesArray
    ]);
}