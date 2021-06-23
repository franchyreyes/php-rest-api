<?php

namespace FJR\database\migrations;

use FJR\database\DatabaseManager;
use FJR\models\CustomerModel;
use Illuminate\Database\Migrations\Migration;

class CustomerMigration extends Migration
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
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->connectionDB::schema($this->connectionName)->create(CustomerModel::name(), function ($table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->connectionDB::schema($this->connectionName)->dropIfExists(CustomerModel::name());
    }
}
