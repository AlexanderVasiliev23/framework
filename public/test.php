<?php

$db_config = require '../config/config_db.php';

require_once '../vendor/lib/functions.php';
require_once 'rb.php';

R::setup($db_config['dsn'], $db_config['user'], $db_config['pass']);
R::fancyDebug(true);

$table = 'category';

// Create

//$cat = R::dispense('category');
//$cat->title = 'Категория 1';
//$id = R::store($cat);

// Read
//$id = 1;
//$cat = R::load('category', $id);
//echo $cat->title;

// Update

//$cat = R::load('category', 4);
//$cat->title = 'Категория 4';
//$result = R::store($cat);

// Delete

//$cat = R::load('category', 2);
//R::trash($cat);
//R::wipe('category');

//$cats = R::findAll($table);
$cats = R::findAll($table, 'id > ?', [2]);

debug($cats);