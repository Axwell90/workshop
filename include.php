<?php
/**
 * Created by PhpStorm.
 * User: Kodix
 * Date: 14.09.2018
 * Time: 22:46
 */

$lib_dir = __DIR__ ;

$lib = array(
    'src/Request.php',
    'src/Responce.php',
);

foreach($lib as $libFile) {
    include_once $lib_dir . '/' . $libFile;
}