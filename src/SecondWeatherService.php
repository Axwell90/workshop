<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 16.09.2018
 * Time: 11:47
 */

namespace Eka\Workshop;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class SecondWeatherService implements IWeatherService
{
    const URL = 'https://www.metaweather.com/api/location/search/';

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
        return self::URL . '?query='.$city.'';
    }

}