<?php

// debug function
function debug($arr) 
{
    echo "<pre>".var_dump($arr).'</pre>';
    exit;
}

use application\core\Router;

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');

    if (file_exists($path))
    {
        require $path;
    }
});

$router = new Router;
