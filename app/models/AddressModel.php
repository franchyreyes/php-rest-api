<?php

namespace FJR\models;

use FJR\traits\ModelTableNameTrait;
use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{

    use ModelTableNameTrait;

    /* @var $connection specify the connection name*/
    protected $connection = 'clientConnection';

    /* @var $table specify the table name */
    protected $table = 'addresses';

    /* 
        Get the customer that owns the address 
        @return FJR\models\CustomerModel
    */
    public function customer()
    {
        return $this->belongsTo('FJR\models\CustomerModel');
    }
}
