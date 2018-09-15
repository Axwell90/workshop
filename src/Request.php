<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 15.09.2018
 * Time: 0:54
 */

namespace Axwell\Workshop;


class Request
{
    public $url;
    public $method = 'GET';

    function __construct($url)
    {
        $this->url = $url;
    }

    public function send($url, $method = "")
    {
        $options = array(
            'http' => array(
                'method'  => !empty($method) ? $method : $this->method,
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) { /* Handle and return error */ }

        return new Responce($result);

    }
}