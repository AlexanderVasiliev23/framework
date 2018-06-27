<?php

use vendor\core\Router;

require_once '../vendor/lib/functions.php';

define('BASE_URL', 'http://localhost/framework');
define('APP_NAME', 'framework');
define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LAYOUT', 'default');

spl_autoload_register(function ($class) {
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

$query = rtrim($_SERVER['QUERY_STRING'], '/');

Router::add('^page/(?<action>[a-z-]+)/(?<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

// default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$');

Router::dispatch($query);


