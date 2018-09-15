<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 14.09.2018
 * Time: 22:27
 */

namespace Workshop\GeolocationApp;


class GeoData
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getCountry()
    {
        return $this->data->country;
    }

    public function getCity()
    {
        return $this->data->city;
    }

}