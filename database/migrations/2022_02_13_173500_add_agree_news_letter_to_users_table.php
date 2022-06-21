<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgreeNewsLetterToUsersTable extends Migration
{

    public $tableName = 'users';

    public $columnName = 'agree_news_letter';


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn($this->tableName, $this->columnName)) {
            Schema::table($this->tableName, function (Blueprint $table) {
                $table->boolean($this->columnName)->default(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn($this->tableName, $this->columnName)) {
            Schema::table($this->tableName, function (Blueprint $table) {
                $table->dropColumn($this->columnName);
            });
        }
    }
}
