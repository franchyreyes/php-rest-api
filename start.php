<?php

# Use composers autoloader

use FJR\services\StartServices;

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/config/env.php');
require_once(__DIR__ . "/config/ini_file.php");
require_once(__DIR__ . "/app/services/StartServices.php");

use FJR\database\migrations\CustomerMigration;
use FJR\database\migrations\AddressMigration;
use FJR\database\seeders\CustomerSeeder;
use FJR\database\seeders\AddressSeeder;
use FJR\database\DatabaseManager as DB;


$configuration = Configuration::getInstance();


try {
    echo $configuration->getItem("message.start.services");
    new StartServices(new CustomerMigration(new DB()), new AddressMigration(new DB()), new CustomerSeeder(new DB()), new AddressSeeder(new DB()));
    echo $configuration->getItem("message.finish.services");
} catch (\Exception $e) {
    echo $e;
    echo $configuration->getItem("message.error.api");
}
