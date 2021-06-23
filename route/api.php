<?php

use Illuminate\Routing\Router;

$router->get('/', function () {

    return "Welcome to the Client API";
});


$router->group(['namespace' => 'FJR\controllers', 'prefix' => 'customer'], function (Router $router) {
    $router->get('/', ['name' => 'customer.index', 'uses' => 'CustomerController@index']);
    $router->get('/{id}', ['name' => 'customer.show', 'uses' => 'CustomerController@show'])->where('id', '[0-9]+');
    $router->get('/{id}/address', ['name' => 'customer.address', 'uses' => 'AddressController@showAddressCustomer'])->where(
        ['id', '[0-9]+'],
    );
});

$router->any('{any}', function () {
    return 'This URL Not Match with our Resource';
})->where('any', '(.*)');
