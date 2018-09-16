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

    private static $services = [
        self::FIRST_SERVICE => FirstWeatherService::class,
        self::SECOND_SERVICE => SecondWeatherService::class,
    ];

    public static function createService($serviceName = null, $httpClient = null)
    {
        $serviceName = $serviceName ?: self::getDefaultService();
        if (!array_key_exists($serviceName, self::$services)) {
            throw new \Exception('Service not supported');
        }
        return new self::$services[$serviceName]($httpClient);
    }

    public static function getServices()
    {
        return array_keys(self::$services);
    }
    public static function getDefaultService()
    {
        return self::FIRST_SERVICE;
    }
}