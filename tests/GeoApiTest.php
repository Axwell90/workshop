<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 15.09.2018
 * Time: 16:43
 */

namespace Axwell\Workshop\Tests;

use GuzzleHttp\ClientInterface;
use Workshop\GeolocationApp\GeoData;
use Workshop\GeolocationApp\GeoApiService;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class GeoApiTest extends TestCase
{
    public function testRequestData()
    {
        $json = <<<JSON
{
    "as": "AS21367 Wiland Ltd",
    "city": "Moscow",
    "country": "Russia",
    "countryCode": "RU",
    "isp": "Wiland Ltd",
    "lat": 55.7522,
    "lon": 37.6156,
    "org": "Wiland Ltd",
    "query": "46.148.196.76",
    "region": "MOW",
    "regionName": "Moscow",
    "status": "success",
    "timezone": "Europe/Moscow",
    "zip": "129344"
}
JSON;

        $geoData = $this->createGeoData($json);//->getDataByIP('91.76.0.2');

        /** @var \Workshop\GeolocationApp\GeoData $geoData */
        $this->assertEquals('Russia', $geoData->getCountry());

        //$geoApi = $this->createGeoApi()->getDataByIP();
        //$this->assertEquals('Russia', $geoApi);
    }

    private function createGeoApi()
    {
        $objApi = new GeoApiService();
        $objApi->setUrl('46.148.196.76');
        $objApi->setMethod('GET');

        return $objApi;
    }

    private function createGeoData($data)
    {
        return new GeoData(\GuzzleHttp\json_decode($data));
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