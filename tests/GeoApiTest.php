<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 15.09.2018
 * Time: 16:43
 */

namespace Axwell\Workshop\Tests;

use GuzzleHttp\ClientInterface;
use Eka\Workshop\Geo\GeoApiService;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class GeoApiTest extends TestCase
{
    public function testRequestData()
    {
        $arValues = [
            "as" => "AS21367 Wiland Ltd",
            "city" => "Moscow",
            "country" => "Russia",
            "countryCode" => "RU",
            "isp" => "Wiland Ltd",
            "lat" => 55.7522,
            "lon" => 37.6156,
            "org" => "Wiland Ltd",
            "query" => "46.148.196.76",
            "region" => "MOW",
            "regionName" => "Moscow",
            "status" => "success",
            "timezone" => "Europe/Moscow",
            "zip" => "129344"
        ];

        $client = $this->createHttpClient(\GuzzleHttp\json_encode($arValues));

        $IpApiService = new GeoApiService($client);
        $geoData = $IpApiService->getDataByIP('46.148.196.76');

        $this->assertEquals($arValues, (array)$geoData->getData());
        $this->assertEquals('Russia', $geoData->getCountry());
        $this->assertEquals('Moscow', $geoData->getCity());
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