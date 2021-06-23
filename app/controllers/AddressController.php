<?php

namespace FJR\controllers;

use Configuration;
use FJR\models\AddressModel;
use Illuminate\Container\Container;
use Illuminate\Http\Response;


class AddressController
{

    private $_addressServices;
    private $_configuration;

    public function __construct()
    {
        $this->_addressServices = Container::getInstance()->make("addressService");
        $this->_configuration = Configuration::getInstance();
    }
    public function index()
    {
        try {
            return new Response([AddressModel::name() => $this->_addressServices->getAll()], 200, ['Content-Type', 'application/json']);
        } catch (\Exception $e) {
            return new Response(
                ['error' => $e->getMessage()],
                404,
                ['Content-Type', 'application/json']
            );
        }
    }
    public function showAddressCustomer($id)
    {
        try {
            $data = $this->_addressServices->findAddressByCustomerID($id);

            if (count($data) == 0) {
                return new Response(
                    ['error' => $this->_configuration->getItem("message.not.found")],
                    404,
                    ['Content-Type', 'application/json']
                );
            }
            return new Response([AddressModel::name() => $data], 200, ['Content-Type', 'application/json']);
        } catch (\Exception $e) {
            return new Response(
                ['error' => $this->_configuration->getItem("message.not.found")],
                404,
                ['Content-Type', 'application/json']
            );
        }
    }
}
