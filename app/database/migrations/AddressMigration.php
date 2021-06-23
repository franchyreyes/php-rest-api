<?php

namespace FJR\database\migrations;

use FJR\database\DatabaseManager;
use FJR\models\CustomerModel;
use FJR\models\AddressModel;
use Illuminate\Database\Migrations\Migration;

class AddressMigration extends Migration
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
        $this->connectionDB::schema($this->connectionName)->create(AddressModel::name(), function ($table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->integer('customer_id')
                ->unsigned();
            $table->timestamps();
            $table->foreign('customer_id')
                ->references('id')
                ->on(CustomerModel::name())
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->connectionDB::schema($this->connectionName)->dropIfExists(AddressModel::name());
    }
}
