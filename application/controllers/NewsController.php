<?php

namespace application\controllers;

use application\core\Controller;

class NewsController extends Controller 
{
    public function showAction()
    {
        $this->view->render('Show Page');
    }
}