<?php

namespace FJR\repositories;

use FJR\repositories\contracts\ICustomerRepository;

class CustomerRepository extends BaseRepository implements ICustomerRepository
{
    public function model()
    {
        return "FJR\models\CustomerModel";
    }
}
