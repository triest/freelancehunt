<?php
// Задаем константы:
define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
$sitePath = realpath(dirname(__FILE__) . DS) . DS;
$sitePath = "/home/sakura1/domains/sakura2.city/public_html/";
define ('SITE_PATH', $sitePath); // путь к корневой папке сайта

// для подключения к бд
define('DB_USER', 'sakura1_sakura2');
define('DB_PASS', 'idsiuxhuip');
define('DB_HOST', 'localhost');
define('DB_NAME', 'sakura1_web_project');