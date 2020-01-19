<?php

namespace application\core;

class Router 
{
    private $routes = [];
    private $params = [];

    public function __construct() 
    {
        $arr = require 'application/config/routes.php';

        foreach ($arr as $key => $value) 
        {
            $this->add($key, $value);
        }

        if($this->match())
        {
            $controller = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
            // echo '<b>controller: </b>'.$controller.'<br><b>action: </b>'.$this->params['action'];
            if(class_exists($controller)) 
            {
                $action = $this->params['action'].'Action';
                
                if(method_exists($controller, $action))
                {
                    $controller = new $controller;
                    $controller->$action();
                }
                else
                {
                    echo 'Метод <b>'.$action.'</b> не существует';
                }
            }
            else 
            {
                echo 'Контроллер <b>'.$controller.'</b> не существует';
            }
        }
        else
        {
            echo '404';
        }
    }
    
    public function add($route, $params) 
    {
        $this->routes[$route] = $params;
    }

    public function match() 
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $key => $value) 
        {
            if($key === $url) {
                $this->params = $value;
                return true; 
            }
        }

        return false;
    }

    public function run() 
    {

    }
}