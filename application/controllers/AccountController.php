<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller 
{
    public function loginAction()
    {
        $this->view->render('Sign In Page');
    }

    public function registerAction()
    {
        $this->view->render('Sign Up Page');
    }
}