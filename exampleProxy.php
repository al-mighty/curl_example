<?php

require_once 'vendor/autoload.php';


$config = require_once('config.php');

function request($url, $postdata = null, $cookiefile = 'C:\openserver\domains\curl\cookie.txt')
{

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0');

    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

    curl_setopt($ch, CURLOPT_PROXY, '47.88.136.236:3128');
//    curl_setopt($ch, CURLOPT_PROXY, '41.222.234.58:8080');
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);

    curl_setopt($ch, CURLOPT_TIMEOUT, 9);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 6);


    if ($postdata) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    }

    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}

//обновляем очищаем куки

file_put_contents('C:\openserver\domains\curl\cookie.txt', '');


//
//$post=[
//    'op' =>'login',
//    'dest' =>'https://www.reddit.com',
//    'user'=>'lunatikspb',
//    'passwd'=>'050593',
//];

$html = request('http://httpbin.org/ip');

echo $html;