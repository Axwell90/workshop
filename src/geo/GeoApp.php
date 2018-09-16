<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 15.09.2018
 * Time: 16:08
 */

namespace Eka\Workshop\Geo;


class GeoApp
{
    private $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    public function getDataByIP($ip)
    {
        return $this->service->getDataByIP($ip);
    }
}