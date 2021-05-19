<?php

class OutdatedBrowserController extends BaseController {

    public function index() {

        $this->view->pick('outdated-browser/index');
    }

}