<?php
include "/home/sakura1/domains/sakura.city/public_html/classes/router.php";
    ini_set('display_errors', 1);
 
// включим отображение всех ошибок
    error_reporting(E_ALL);
// подключаем конфиг

    include('config.php');
    

// Соединяемся с БД
// $dbObject = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

// подключаем ядро сайта
    include('core/core.php');


    /*
     * создаем гобальную переменную
     * */
    global $mysqli;
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    global $userauth;
  
    $router = new Router($registry);
   
    ob_start();
    session_start();
// записываем данные в реестр
   
  
    $registry->set('router', $router);
// задаем путь до папки контроллеров.
    $router->setPath(SITE_PATH . 'controllers');

// запускаем маршрутизатор


    $router->start();


