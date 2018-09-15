<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 15.09.2018
 * Time: 01:02
 */

namespace Axwell\Workshop;


class Responce
{
    protected $content;
    protected $objContent;

    function __construct($content)
    {
        $this->content = $content;
    }

    public function parseResponce()
    {
        $xml = simplexml_load_string($this->content) or die("Error: Cannot create object");

        $this->objContent = $xml;
    }

    public function getCountry()
    {
        return (string)$this->objContent->ip->country;
    }

    public function getCity()
    {
        return (string)$this->objContent->ip->city;
    }

}