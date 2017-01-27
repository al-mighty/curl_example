<?php
//Для сессии

require_once 'vendor/autoload.php';


if (isset($_COOKIE['curl_normal_cookie'])) {
    $cook = true;
    echo "Нормальная кука \r\n";
}

if (isset($_COOKIE['curl_session_cookie'])) {
    $cook = true;
    echo "сессионная кука \r\n";
}


setcookie('curl_session_cookie', 1, microtime(true) + 10000);
setcookie('curl_normal_cookie', 1);


echo $cook ? "я тебя знаю!" : "я тебя НЕ ЗНАЮ";