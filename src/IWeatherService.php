<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 16.09.2018
 * Time: 15:27
 */

namespace Eka\Workshop;

use GuzzleHttp\ClientInterface;

interface IWeatherService
{
    public function __construct(ClientInterface $client = null);
    public function getData($city);

}