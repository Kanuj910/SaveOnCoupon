<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_home', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('alt');
            $table->string('title');
            $table->string('link');
            $table->tinyInteger('target')->default(0);
            $table->tinyInteger('isActive')->default(1);
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
        Schema::drop('banner_home');
    }
}
