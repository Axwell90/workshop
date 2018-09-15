Библиотека для получения гео данных по IP

Пример использования

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Workshop\GeolocationApp\GeoApp;
use \Workshop\GeolocationApp\GeoApiService;

$objApi = new GeoApiService();
$objApi->setUrl('127.0.0.1');
$objApi->setMethod('GET');

$app = new GeoApp($objApi);

/** @var \Workshop\GeolocationApp\GeoData $geoData */
$geoData = $app->getDataByIP();

var_dump($geoData->getData());
var_dump($geoData->getCountry());
```