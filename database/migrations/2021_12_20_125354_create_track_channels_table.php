<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_channels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('track_id')->unsigned()->index();
            $table->foreign('track_id')->references('id')
                ->on('tracks')->onDelete('cascade');

            $table->bigInteger('channel_id')->unsigned()->index();
            $table->foreign('channel_id')->references('id')
                ->on('channels')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('track_channels');
    }
}
