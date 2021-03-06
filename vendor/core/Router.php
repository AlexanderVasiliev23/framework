<?php

namespace vendor\core;

class Router
{
    /**
     * Контроллер и метод для текущего маршрута
     *
     * @var
     */
    private static $route = [];

    /**
     * Таблица маршрутов
     *
     * @var array
     */
    private static $routes = [];

    /**
     * Получить текущий маршрут
     *
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * Получить маршруты
     *
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * Добавить маршрут
     *
     * @param $regexp
     * @param array $route
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Поиск маршрута по запросу
     *
     * @param $url
     * @return bool
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if ( ! isset($route['action'])) {
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Вызов соответствующего контроллера и его метода, если они найдены по запросу
     *
     * @param $url
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                } else {
                    echo "Метод <b>$controller::$action</b> не найден";
                }
            } else {
                echo "Контроллер <b>$controller</b> не найден";
            }
        } else {
            http_response_code(404);
            include '404.html';
        }
    }

    /**
     * Преобразование в имя класса
     *
     * @param $name
     * @return mixed
     */
    private static function upperCamelCase($name)
    {
        return str_replace('-', '', ucwords($name, '-'));
    }

    /**
     * Преобразование в имя функции
     *
     * @param $name
     * @return mixed
     */
    private static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    /**
     * Удалить из строки GET параметры
     *
     * @param $url
     * @return string
     */
    private static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }
}