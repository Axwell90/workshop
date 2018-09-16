Библиотека для получения гео данных по IP

Пример использования

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Workshop\Geo\GeolocationApp\GeoApp;
use \Workshop\Geo\GeolocationApp\GeoApiService;

$app = new GeoApp(new GeoApiService());

/** @var \Workshop\Geo\GeolocationApp\GeoData $geoData */
$geoData = $app->getDataByIP();

var_dump($geoData->getData());
var_dump($geoData->getCountry());
```

Библиотека для получения информации о погоде

Пример использования

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

Eka\Workshop\WeatherServiceFactory;

$obj = new \Eka\Workshop\FirstWeatherService();
$data = $obj->getData('london')->getWeather());

echo $data[0]['main'];
```

Использование в виде CLI приложения:

```php
bin/weather
```