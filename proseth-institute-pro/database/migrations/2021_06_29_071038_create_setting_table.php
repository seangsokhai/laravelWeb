<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('facebook_link');
            $table->string('youtube_link');
            $table->string('twitter_link');
            $table->string('linkin_link');
            $table->string('phone_number');
            $table->string('mail');
            $table->string('map');
            $table->string('address');
            $table->string('footer_text');
            $table->string('open_daily');
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
        Schema::dropIfExists('setting');
    }
}
