<?php

class IndexController extends BaseController
{

    public function indexAction()
    {
        $this->view->pick('dashboard/index');
    }

}