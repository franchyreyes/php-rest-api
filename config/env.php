<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$dotenv->required('DB_USER')->notEmpty();
$dotenv->required('DB_PASSWD');
$dotenv->required('DB_NAME')->notEmpty();
$dotenv->required('DB_HOST')->notEmpty();
$dotenv->required('DB_PORT')->notEmpty();
$dotenv->required(['DB_USER', 'DB_PASSWD', 'DB_NAME', 'DB_HOST', 'DB_PORT']);
