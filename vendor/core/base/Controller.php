<?php

namespace vendor\core\base;

abstract class Controller
{
    /**
     * Параметры текущего маршрута (controller, action)
     *
     * @var array
     */
    public $route = [];

    public $view;

    /**
     * Controller constructor.
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];

        $view = APP . "/views/{$route['controller']}/{$this->view}.php";

        if (is_file($view)) {
            include $view;
        }
    }
}