<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_tags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('track_id')->unsigned()->index()->default(0);
            $table->foreign('track_id')->references('id')
                ->on('tracks')->onDelete('cascade');
            $table->bigInteger('tag_id')->unsigned()->index()->default(0);
            $table->foreign('tag_id')->references('id')
                ->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('track_tags');
    }
}
