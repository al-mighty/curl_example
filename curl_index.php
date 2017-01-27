<?php


require_once 'vendor/autoload.php';


$ch = curl_init('http://curl/cookie_test.php');
$cookiefile='C:\openserver\domains\curl\cookie.txt';

curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_HEADER,true);

//1ый вариант
//curl_setopt($ch, CURLOPT_COOKIE,'curl_normal_cookie=1; curl_session_cookie=1');

//2ой - имитация сессии
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);

//true до закрытия браузера, false куки что имеют время
curl_setopt($ch, CURLOPT_COOKIESESSION, true);

$html = curl_exec($ch);

curl_close($ch);

xprint($html);