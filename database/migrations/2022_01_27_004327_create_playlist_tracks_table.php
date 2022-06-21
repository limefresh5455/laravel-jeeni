<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_tracks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('playlist_id')->unsigned()->index()->default(0);
            $table->foreign('playlist_id')->references('id')
                ->on('playlists')->onDelete('cascade');
            $table->bigInteger('track_id')->unsigned()->index()->default(0);
            $table->foreign('track_id')->references('id')
                ->on('tracks')->onDelete('cascade');
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
        Schema::dropIfExists('playlist_tracks');
    }
}
