Библиотека для получения гео данных по IP

Пример использования

<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Axwell\Workshop\Request;
use \Axwell\Workshop\Responce;
use \Axwell\Workshop\GeoData;

$objRequest = new \Axwell\Workshop\Request('127.0.0.1');

$objResponce = $objRequest->send($objRequest->url);

$geoData = $objResponce->parseResponce();

var_dump($geoData);