<?php

namespace application\core;

class View
{
    public $route;
    public $layout = 'default'; // Шаблон

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        ob_start();
        require 'application\views\\'.$this->route['controller'].'\\'.$this->route['action'].'.php';
        $content = ob_get_clean();
        require 'application\views\layout\\'.$this->layout.'.php';
    }

    //view of errors
    public static function error($code)
    {
        http_response_code($code);
        require 'application\views\errors\\'.$code.'.php';
        exit;
    }

    //redirect function
    public function redirect($url)
    {
        header('location: '.$url);
        exit;
    }
}