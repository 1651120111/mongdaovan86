<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 06-Jul-18
 * Time: 4:00 PM
 */
$config = [
    'defaultRoute' => 'v2/index',
    'components' => require __DIR__ . '/components.php',
    'params' => require __DIR__ . '/params.php',
];

return $config;
