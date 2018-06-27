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

    /**
     * Текущий вид
     *
     * @var
     */
    public $view;

    /**
     * Текущий шаблон
     *
     * @var string
     */
    public $layout;

    /**
     * Пользовательские данные, передаваемые в шаблон
     *
     * @var array
     */
    public $vars = [];

    /**
     * Controller constructor.
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    /**
     * Получить вид
     */
    public function getView()
    {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    /**
     * @param $vars
     */
    public function set($vars)
    {
        $this->vars = $vars;
    }
}