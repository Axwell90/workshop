Библиотека для получения гео данных по IP

Пример использования

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Axwell\Workshop\Request;
use \Axwell\Workshop\Response;
use \Axwell\Workshop\GeoData;

$objRequest = new \Workshop\Request('127.0.0.1');

$objResponse = $objRequest->send($objRequest->url);

$geoData = $objResponse->parseResponse();

var_dump($geoData);
```