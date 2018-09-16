<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 16.09.2018
 * Time: 10:30
 */

namespace Eka\Workshop;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class FirstWeatherService implements IWeatherService
{
    const KEY = 'b6907d289e10d714a6e88b30761fae22';
    const URL = 'http://openweathermap.org/data/2.5/weather';

    private $httpClient;

    public function __construct(ClientInterface $client = null)
    {
        $this->httpClient = $client ? : new Client();
    }

    public function getData($city)
    {
        $response = $this->httpClient->request('GET', $this->getUrlByCity($city));
        return $this->parse($response->getBody());
    }

    private function parse($json)
    {
        $weatherData = json_decode($json, true);

        return new WeatherData($weatherData);
    }

    private function getUrlByCity($city)
    {
        return self::URL . '?appid='.self::KEY.'&q='.$city.'';

   }
}