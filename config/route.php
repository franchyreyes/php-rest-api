<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use FJR\database\DatabaseManager;
use FJR\repositories\AddressRepository;
use FJR\repositories\contracts\IAddressRepository;
use FJR\repositories\contracts\ICustomerRepository;
use FJR\repositories\CustomerRepository;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Facade;

// Create a service container
$container = Container::getInstance();

$container->instance(Container::class, $container);
Facade::setFacadeApplication($container);
$container->singleton('app', 'Illuminate\Container\Container');
class_alias('Illuminate\Support\Facades\App', 'App');

$container->singleton(DatabaseManager::class);

// Bind a  class to the container
$container->bind('customerService', 'FJR\services\CustomerServices');
$container->bind('addressService', 'FJR\services\AddressServices');
$container->singleton('startService', 'FJR\services\StartServices');


// Bind an interface to a given implementation.
$container->bind(ICustomerRepository::class, CustomerRepository::class);

$container->bind(IAddressRepository::class, AddressRepository::class);

// Create a request from server variables, and bind it to the container; optional
$request = Request::capture();
$container->instance('Illuminate\Http\Request', $request);

// Using Illuminate/Events/Dispatcher here (not required); any implementation of
// Illuminate/Contracts/Event/Dispatcher is acceptable
$events = new Dispatcher($container);

// Create the router instance
$router = new Router($events, $container);

// Load the routes
require_once  __DIR__ . '/../route/api.php';

// Create the redirect instance
$redirect = new Redirector(new UrlGenerator($router->getRoutes(), $request));

// Dispatch the request through the router
$response = $router->dispatch($request);

// Send the response back to the browser
$response->send();
