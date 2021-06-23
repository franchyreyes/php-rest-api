<?php

return [
    'db'  => [
        'user' => $_ENV['DB_USER'],
        'pass' => $_ENV['DB_PASSWD'],
        'name' => $_ENV['DB_NAME'],
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],

    ],
    'database' => [
        'connections' => 'clientConnection'
    ],
    'message' => [
        'start.services' => "<br/> Start - Creating Configuration process",
        'finish.services' => "<br/> Finish - Creating Configuration process",
        'error.api' => "Error Loading the API",
        'not.found' => "Not Result Found"
    ]
];
