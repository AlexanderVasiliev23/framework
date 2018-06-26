<?php

namespace app\controllers;

use vendor\core\base\Controller;

class Posts extends Controller
{
    public function indexAction()
    {
        echo __METHOD__;
    }

    public function testAction()
    {
        debug($this->route);

        echo __METHOD__;
    }

    public function before()
    {
        echo __METHOD__;
    }
}