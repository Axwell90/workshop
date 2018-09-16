<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 16.09.2018
 * Time: 10:40
 */

namespace Eka\Workshop;

class WeatherData
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getWeather()
    {
        return $this->data['weather'];
    }
}