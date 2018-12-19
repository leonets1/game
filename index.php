<?php

ini_set ('display_errors', 10);
error_reporting(E_ALL);

// включаем  сесии 
session_start();

// константа с путем к каталогу
define('ROOT', dirname(__FILE__));

// подгрузка автолоадера для загрузки классов 
require_once(ROOT.'/components/Autoload.php');


// создаем объект из класса Router 
$router = new Router();

// вызываем основной метод роутера 
$router -> run();

