<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 14.09.2018
 * Time: 22:28
 */
require_once('include.php');

$url = 'http://ipgeobase.ru:7020/geo?ip='.$argv[1];

$objRequest = new \Axwell\Workshop\Request($url);

$objResponce = $objRequest->send($objRequest->url);

$objResponce->parseResponce();

var_dump($objResponce->getCountry());
var_dump($objResponce->getCity());