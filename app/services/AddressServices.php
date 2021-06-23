<?php

namespace FJR\services;


use FJR\repositories\contracts\IAddressRepository;

class AddressServices
{

    private $_IAddressRepository;

    function __construct(IAddressRepository $_IAddressRepository)
    {
        $this->_IAddressRepository = $_IAddressRepository;
    }

    public function findAddressByCustomerID($id)
    {
        $columData = [
            ["customer_id", $id]
        ];
        return $this->_IAddressRepository->where($columData);
    }

    public function getAll()
    {
        return $this->_IAddressRepository->getAll();
    }
}
