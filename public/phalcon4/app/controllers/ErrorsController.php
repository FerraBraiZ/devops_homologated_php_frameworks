<?php

class ErrorsController extends BaseController
{

    public function error404Action()
    {
        $this->view->pick('errors/error404');
    }

    public function error500Action()
    {
        $this->view->pick('errors/error500');
    }


}