<?php

namespace App\Core;
class App
{
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        $controllerClassName = 'App\\Controllers\\' . (!empty($url[0]) ? $url[0] : $this->controller);
        if (class_exists($controllerClassName)) {
            $this->controller = $controllerClassName;
            unset($url[0]);
        } else {
            $this->controller = "App\\Controllers\\home";
        }
        $this->controller = new $this->controller;
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];
        try {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } catch (\TypeError $e) {
            if (str_contains($e->getMessage(), 'does not have a method')) {
               redirect("Error");
            } else {
                throw $e;
            }
        } catch (\Exception $e) {
            die("Caught an exception: " . $e->getMessage());
        }


    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}




