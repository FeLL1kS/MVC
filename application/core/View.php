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
        ob_start();
        require 'application\views\\'.$this->route['controller'].'\\'.$this->route['action'].'.php';
        $content = ob_get_clean();
        require 'application\views\layout\\'.$this->layout.'.php';
    }
}