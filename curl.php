<?php


require_once 'vendor/autoload.php';


$ch1 = curl_init('http://httpbin.org');
$ch = curl_init('http://ya.ru');
//СОхраняем в $ch
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);

//получение только заголовков
curl_setopt($ch, CURLOPT_NOBODY,true);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//отключение проверко по https
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


$html = curl_exec($ch);

curl_close($ch);


xprint($html);