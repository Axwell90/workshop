<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 15.09.2018
 * Time: 16:09
 */

namespace Eka\Workshop\Geo;


abstract class Service
{
    abstract function getDataByIP($ip);
}