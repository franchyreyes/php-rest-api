<?php

namespace FJR\services;


use FJR\repositories\contracts\ICustomerRepository;

class CustomerServices
{

    private $_ICustomerRepository;

    function __construct(ICustomerRepository $_ICustomerRepository)
    {
        $this->_ICustomerRepository = $_ICustomerRepository;
    }

    public function findById($id)
    {
        return $this->_ICustomerRepository->findById($id);
    }

    public function getAll()
    {
        return $this->_ICustomerRepository->getAll();
    }
}
