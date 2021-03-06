<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('offer_tags')) {
            Schema::create('offer_tags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('offer_id')->constrained('offers');
                $table->foreignId('tag_id')->constrained('tags');
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
        Schema::dropIfExists('offer_tags');
    }
}
