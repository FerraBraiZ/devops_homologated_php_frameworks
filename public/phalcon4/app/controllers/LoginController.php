<?php

class LoginController extends BaseController
{

    public function indexAction()
    {
        $this->view->pick('login/index');
    }

    public function doLogIn()
    {

    }

}