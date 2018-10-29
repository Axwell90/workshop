<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 16.09.2018
 * Time: 10:22
 */

namespace Eka\Workshop;

use GuzzleHttp\ClientInterface;

class WeatherServiceFactory
{
    const FIRST_SERVICE = 'openweathermap';
    const SECOND_SERVICE = 'metaweather';

    private $services = [
        self::FIRST_SERVICE => FirstWeatherService::class,
        self::SECOND_SERVICE => SecondWeatherService::class,
    ];

    private $service;

    public function __construct($serviceName = self::FIRST_SERVICE, $additionalServices = [], $httpClient = null)
    {
        $this->services = array_merge($this->services,$additionalServices);
        $this->service = $this->createService($serviceName, $httpClient);
    }

    private function createService($serviceName = null, $httpClient = null)
    {
        //$serviceName = $serviceName ?: self::getDefaultService();
        if (!array_key_exists($serviceName, $this->services)) {
            throw new \Exception('Service not supported');
        }
        return new $this->services[$serviceName]($httpClient);
    }

    public function getData($city, $serviceName = null)
    {
        if ($serviceName) {
            return $this->createService($serviceName)->getData($city);
        }
        return $this->service->getData($city);
    }

    public static function getServices()
    {
        return array_keys([
            self::FIRST_SERVICE => FirstWeatherService::class,
            self::SECOND_SERVICE => SecondWeatherService::class,
        ]);
    }

    public static function getDefaultService()
    {
        return self::FIRST_SERVICE;
    }
}