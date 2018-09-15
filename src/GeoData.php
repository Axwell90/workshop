<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 14.09.2018
 * Time: 22:27
 */

namespace Axwell\Workshop;


class GeoData
{
    private $country;
    private $city;

    public function __construct($objXml)
    {
        $this->country = (string)$objXml->ip->country;
        $this->city = (string)$objXml->ip->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getCity()
    {
        return $this->city;
    }

}