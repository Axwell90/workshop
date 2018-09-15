<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 15.09.2018
 * Time: 0:54
 */

namespace Workshop\GeolocationApp;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class GeoApiService extends Service
{
    const URL = 'http://ip-api.com/json/';

    private $url;
    public $method = 'GET';

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @param ClientInterface|null $client
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->httpClient = $client ? : new Client();
    }

    function setUrl($url)
    {
        $this->url = self::URL.$url;
    }

    function setMethod($method)
    {
        $this->method = $method;
    }

        public function getDataByIP()
    {
        //$client = new \GuzzleHttp\Client();

        //$res = $client->request($this->method, $this->url);
        $res = $this->httpClient->request($this->method, $this->url);

        if ($res->getStatusCode() !== 200) { /* Handle and return error */ }

        return new GeoData(\GuzzleHttp\json_decode($res->getBody()));
    }
}