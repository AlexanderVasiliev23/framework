<?php

require_once '../vendor/lib/functions.php';
require_once '../vendor/core/Router.php';

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');

spl_autoload_register(function ($class) {
    $file = APP . "/controllers/$class.php";
    if (file_exists($file)) {
        require_once $file;
    }
});

$query = rtrim($_SERVER['QUERY_STRING'], '/');

Router::add('^pages/?(?<action>[a-z-]+)?$', ['controller' => 'Posts', 'action' => 'index']);

// default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?<controller>[a-z-]+)/?(?<action>[a-z-]+)?$');

$test = Router::dispatch($query);

dd($test);

