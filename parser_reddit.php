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

    curl_setopt($ch, CURLOPT_PROXY, '124.193.87.70:1080');
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);

    if ($postdata) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    }

    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}

//обновляем очищаем куки

file_put_contents('C:\openserver\domains\curl\cookie.txt', '');



$post=[
    'op' =>'login',
    'dest' =>'https://www.reddit.com',
    'user'=>'lunatikspb',
    'passwd'=>'050593',
];

$html = request('https://www.reddit.com/post/login',$post);


//xprint($html,'html');

echo $html;
