<?php

namespace FJR\database;

use Configuration;
use Illuminate\Database\Capsule\Manager as DB;


class DatabaseManager
{
    private $db;
    private  $configuration;

    public function __construct()
    {

        $this->db = new DB();
        $this->configuration = Configuration::getInstance();
        $clientConnection  = array(
            'driver' => 'mysql',
            'host' => $this->configuration->getItem("db.host"),
            'database' => $this->configuration->getItem("db.name"),
            'username' => $this->configuration->getItem("db.user"),
            'password' => $this->configuration->getItem("db.pass"),
            'port'   => $this->configuration->getItem("db.port"),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => ''
        );

        $this->db->addConnection($clientConnection, $this->configuration->getItem("database.connections"));

        $this->db->setAsGlobal();

        $this->db->bootEloquent();
    }

    public function getConnectionName()
    {
        return $this->configuration->getItem("database.connections");
    }

    public function getCapsuleManager()
    {
        return $this->db;
    }
}
