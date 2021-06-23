<?php

namespace FJR\controllers;

use Configuration;
use FJR\models\CustomerModel;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CustomerController
{

    private $_customerServices;
    private $_configuration;

    public function __construct()
    {
        $this->_customerServices = Container::getInstance()->make("customerService");
        $this->_configuration = Configuration::getInstance();
    }

    public function index()
    {
        try {
            return new Response([CustomerModel::name() => $this->_customerServices->getAll()], 200, ['Content-Type', 'application/json']);
        } catch (\Exception $e) {
            return new Response(
                ['error' => $e->getMessage()],
                404,
                ['Content-Type', 'application/json']
            );
        }
    }
    public function show($id)
    {
        try {
            return new Response([CustomerModel::name() => $this->_customerServices->findById($id)], 200, ['Content-Type', 'application/json']);
        } catch (\Exception $e) {
            return new Response(
                ['error' => $this->_configuration->getItem("message.not.found")],
                404,
                ['Content-Type', 'application/json']
            );
        }
    }
}
