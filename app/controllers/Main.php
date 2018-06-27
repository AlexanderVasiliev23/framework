<?php

namespace app\controllers;

class Main extends App
{
    public function indexAction()
    {
        $name = 'Тестовое имя';

        $colors = [
            'white' => 'белый',
            'black' => 'черный'
        ];

        $this->set(compact('name', 'colors'));
    }
}