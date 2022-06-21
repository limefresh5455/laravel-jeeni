<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToUsersTable extends Migration
{

    public $newColumns = [
        'first_name',
        'last_name',
        'display_name',
        'api_token'
    ];

    public $tableName = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->bigInteger('role_id')->unsigned()->nullable($value = false)->default(0)->change();
        });

        foreach ($this->newColumns as $columnName) {
            if (!Schema::hasColumn($this->tableName, $columnName)) {
                Schema::table($this->tableName, function (Blueprint $table) use ($columnName) {
                    $table->string($columnName,50)->nullable();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->newColumns as $columnName) {
            if (Schema::hasColumn($this->tableName, $columnName)) {
                Schema::table($this->tableName, function (Blueprint $table) use ($columnName) {
                    $table->dropColumn($columnName);
                });
            }
        }
    }
}
