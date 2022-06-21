<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_channels')) {
            Schema::create('user_channels', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->unsigned()->index()->default(0);
                $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');
                $table->bigInteger('channel_id')->unsigned()->index()->default(0);
                $table->foreign('channel_id')->references('id')
                    ->on('channels')->onDelete('cascade');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('user_votes')) {
            Schema::create('user_votes', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->unsigned()->index()->default(0);
                $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');
                $table->bigInteger('track_id')->unsigned()->index()->default(0);
                $table->foreign('track_id')->references('id')
                    ->on('tracks')->onDelete('cascade');
                $table->timestamps();
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
        if(!Schema::hasTable('user_channels')) {
            Schema::dropIfExists('user_channels');
        }

        if(!Schema::hasTable('user_votes')) {
            Schema::dropIfExists('user_votes');
        }
    }
}
