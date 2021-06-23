<?php

namespace FJR\models;

use FJR\traits\ModelTableNameTrait;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{

    use ModelTableNameTrait;

    /* @var $connection specify the connection name*/
    protected $connection = 'clientConnection';

    /* @var $table specify the table name */
    protected $table = 'customers';

    /* 
        Get the addresses of a customer
        @return FJR\models\AddressModel
    */
    public function addresses()
    {
        return $this->hasMany("FJR\models\AddressModel", "customer_id");
    }
}
