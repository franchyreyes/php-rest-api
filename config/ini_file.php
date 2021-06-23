<?php

# Use composers autoloader
require __DIR__ . '/../vendor/autoload.php';

use Maer\Config\Config;

class Configuration
{

    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = new Config();
        if (!$this->config->isLoaded(__DIR__ . '/config.php')) {
            $this->config->load(__DIR__ . '/config.php');
        }
    }

    public static  function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Configuration();
        }
        return self::$instance;
    }
    private function checkItem($key)
    {
        if ($this->config->has($key)) {
            return true;
        }
        return false;
    }
    public function getItem($key)
    {
        if ($this->checkItem($key)) {
            return $this->config->get($key);
        }
        return 'Not Found';
    }
}
