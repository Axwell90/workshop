<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 15.09.2018
 * Time: 01:02
 */

namespace Axwell\Workshop;


class Response
{
    protected $content;
    protected $objContent;

    function __construct($content)
    {
        $this->content = $content;
    }

    public function parseResponse()
    {
        $xml = simplexml_load_string($this->content) or die("Error: Cannot create object");

        return new GeoData($xml);
    }

}