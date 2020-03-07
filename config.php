<?php
// Задаем константы:
define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
$sitePath = realpath(dirname(__FILE__) . DS) . DS;
$sitePath = "/home/sakura1/domains/sakura.city/public_html/";
define ('SITE_PATH', $sitePath); // путь к корневой папке сайта

// для подключения к бд
define('DB_USER', 'sakura1_sakura1');
define('DB_PASS', '22d2af28');
define('DB_HOST', 'localhost');
define('DB_NAME', 'sakura1_sakura');