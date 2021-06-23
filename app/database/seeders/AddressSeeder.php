<?php

namespace FJR\database\seeders;

use Faker\Factory as fake;
use FJR\database\DatabaseManager;
use FJR\models\CustomerModel;
use FJR\models\AddressModel;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{

    private $connectionDB;
    private $connectionName;
    private $_databaseManager;

    function __construct(DatabaseManager $databaseManager)
    {
        $this->_databaseManager = $databaseManager;
        $this->connectionDB = $this->_databaseManager->getCapsuleManager();
        $this->connectionName = $this->_databaseManager->getConnectionName();
    }

    /**
     * Run the database seeders.
     *
     * @return void
     */

    public function run()
    {
        $values = [];
        $customersID = $this->connectionDB::table(CustomerModel::name(), null, $this->connectionName)->pluck('id');
        $dummy = fake::create();

        foreach ($customersID as $customerID) {
            for ($i = 0; $i < 10; $i++) {
                $values[] = [
                    'description' => $dummy->address,
                    'customer_id' => $customerID,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }
        }

        $this->connectionDB::table(AddressModel::name(), null, $this->connectionName)->insert($values);
    }
}
