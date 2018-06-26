<?php

namespace vendor\core\base;

class View
{
    /**
     * Параметры текущего маршрута
     *
     * @var array
     */
    public $route = [];

    /**
     * Текущий вид
     *
     * @var string
     */
    public $view;

    /**
     * Текущий шаблон
     *
     * @var string
     */
    public $layout;

    /**
     * View constructor.
     * @param $route
     * @param string $layout
     * @param string $view
     */
    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
    }

    /**
     *
     */
    public function render()
    {
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        if (is_file($file_view)) {
            require $file_view;
        } else {
            echo "<p>Не найден вид <b>$file_view</b></p>";
        }
    }
}