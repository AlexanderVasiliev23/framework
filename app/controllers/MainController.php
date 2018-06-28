<?php

namespace app\controllers;

use R;
use app\models\Main;

class MainController extends AppController
{
    public function indexAction()
    {
        $model = new Main();

        $posts = R::findOne($model->table);

        $title = 'PAGE TITLE';

        $this->set(compact('title', 'posts'));
    }
}