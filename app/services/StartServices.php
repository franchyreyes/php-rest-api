<?php

namespace FJR\services;

use FJR\database\migrations\CustomerMigration;
use FJR\database\migrations\AddressMigration;
use FJR\database\seeders\CustomerSeeder;
use FJR\database\seeders\AddressSeeder;

class StartServices
{

    private $customerMigration;
    private $addressMigration;
    private $customerSeeder;
    private $addressSeeder;

    public function __construct(
        CustomerMigration $customerMigration,
        AddressMigration $addressMigration,
        CustomerSeeder $customerSeeder,
        AddressSeeder $addressSeeder
    ) {

        $this->customerMigration = $customerMigration;
        $this->addressMigration = $addressMigration;
        $this->customerSeeder = $customerSeeder;
        $this->addressSeeder = $addressSeeder;
        $this->finishMigration();
        $this->startMigration();
        $this->startSeed();
    }
    public function startMigration()
    {
        $this->customerMigration->up();
        $this->addressMigration->up();
    }

    public function startSeed()
    {
        $this->customerSeeder->run();
        $this->addressSeeder->run();;
    }

    public function finishMigration()
    {
        $this->addressMigration->down();
        $this->customerMigration->down();
    }
}
