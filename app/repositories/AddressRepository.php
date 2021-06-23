<?php

namespace FJR\repositories;

use FJR\repositories\contracts\IAddressRepository;

class AddressRepository extends BaseRepository implements IAddressRepository
{
    public function model()
    {
        return "FJR\models\AddressModel";
    }
}
