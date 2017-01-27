<?php

require_once 'vendor/autoload.php';


$html = file_get_contents('http://pogoda.yandex.ru');
$html2 = file_get_contents('http://allo.ua/ru/products/mobile/apple-iphone-7-32gb-space-gray.html');


phpQuery::newDocument($html2);

$title = pq('title')->text();

$temperature = pq('.forecast-brief__item-temp-day')->text();
//$temperature = pq('.current-weather__thermometer current-weather__thermometer_type_now')->text();

//$tempTitle = pq('.orecast-brief__item-temp-day')->attr('title');
$tempTitle = pq('.current-weather__info-row > abbr.icon-abbr')->attr('title'); //ok
echo "<br>";
//xprint($temperature,'temperature');

//xd($tempTitle,'title');


//$forecast = pq('ul.forecast-brief')->children('li.forecast-brief__item:not(.forecast-brief__item_gap)');

//foreach ($forecast as $li){
////    xd(pq($li));
//
//    echo "<br> до";
//    $li=pq($li);
////    xd($li);
//
//  xprint($li->html() );
//
//  $li->find('.icon')->remove();
//  $li->append('lol=D');
//  echo "<br> после";
//    xprint($li->html() );
//
//
//}


//$price= pq('span.sum');
$price= pq('span.price-sym-7')->children('span.sum');

xd($price);

phpQuery::unloadDocuments();