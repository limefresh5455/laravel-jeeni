<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_feedbacks')) {
            Schema::create('user_feedbacks', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->unsigned()->index()->default(0);
                $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');
                $table->longText('feedback');
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
        Schema::dropIfExists('user_feedbacks');
    }
}
