<?php

class DashboardController extends BaseController
{

    public function indexAction()
    {
        $this->view->pick('dashboard/index');
    }

}