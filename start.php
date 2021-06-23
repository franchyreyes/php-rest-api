<?php

# Use composers autoloader
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/config/env.php');
require_once(__DIR__ . "/config/ini_file.php");
require_once(__DIR__ . "/config/route.php");

use Illuminate\Container\Container;

$configuration = Configuration::getInstance();


try {
    echo $configuration->getItem("message.start.services");
    $startService = Container::getInstance()->make('startService');
    echo $configuration->getItem("message.finish.services");
} catch (\Exception $e) {
    echo $configuration->getItem("message.error.api");
}
