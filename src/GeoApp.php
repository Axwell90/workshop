<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 15.09.2018
 * Time: 16:08
 */

namespace Workshop\GeolocationApp;


class GeoApp
{
    private $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    public function getDataByIP()
    {
        return $this->service->getDataByIP();
    }
}