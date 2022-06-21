<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialLinksToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cover_photo')->nullable();
            $table->text('bio')->nullable();
            $table->string('facebook_social')->nullable();
            $table->string('twitter_social')->nullable();
            $table->string('linkedin_social')->nullable();
            $table->string('instagram_social')->nullable();
            $table->string('website_social')->nullable();
            $table->string('youtube_social')->nullable();
            $table->string('paypal_link')->nullable();
            $table->boolean('is_active')->default(false);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'cover_photo',
                'bio',
                'facebook_social',
                'twitter_social',
                'linkedin_social',
                'instagram_social',
                'website_social',
                'youtube_social',
                'paypal_link',
                'is_active'
            ]);
        });
    }
}
