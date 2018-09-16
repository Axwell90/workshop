<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 16.09.2018
 * Time: 10:42
 */

namespace Axwell\Workshop\Tests;

use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Eka\Workshop\WeatherServiceFactory;

class WeatherTest extends TestCase
{
    public function testDefaultService()
    {
        $arWeather = [
            [
                'id' => '803',
                'main' => 'Clouds',
                'description' => 'broken clouds',
                'icon' => '04d',
            ]
        ];
        $client = $this->createHttpClient($arWeather);

        $objService = new WeatherServiceFactory($client);
        $weather = $objService->createService()->getData('london')->getWeather();

        $this->assertEquals($arWeather, $weather);
    }

    private function createHttpClient($body)
    {
        $httpResponse = $this->createMock(ResponseInterface::class);
        $httpResponse
            ->method('getBody')
            ->willReturn($body);
        $httpClient = $this->createMock(ClientInterface::class);
        $httpClient
            ->method('request')
            ->willReturn($httpResponse);
        return $httpClient;
    }
}