<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToTracksTable extends Migration
{

    public $tableName = 'tracks';

    public $columnName = [
        'excerpt',
        'description'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(!Schema::hasColumn($this->tableName, 'status_id')) {
            Schema::table($this->tableName, function (Blueprint $table) {
                $table->bigInteger('status_id')->unsigned()->index()->default(0);
                $table->foreign('status_id')->references('id')
                    ->on('track_status')->onDelete('cascade');
            });
        }

        if(!Schema::hasColumn($this->tableName, 'title')) {
            Schema::table($this->tableName, function (Blueprint $table) {
                $table->string('title', 120)->nullable()->change();
            });
        }


        foreach ($this->columnName as $columnName) {
            if(!Schema::hasColumn($this->tableName, $columnName)) {
                Schema::table($this->tableName, function (Blueprint $table) use ($columnName) {
                    $table->text($columnName)->nullable();
                });
            }
        }

        if(!Schema::hasColumn($this->tableName, 'publish_date')) {
            Schema::table($this->tableName, function (Blueprint $table) {
                $table->dateTime('publish_date')->nullable()->after('created_at');
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
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->dropColumn([
                'excerpt',
                'description'
            ]);
        });

        if(Schema::hasColumn($this->tableName, 'publish_date')) {
            Schema::table($this->tableName, function (Blueprint $table) {
                $table->dropColumn('publish_date');
            });
        }
    }
}
