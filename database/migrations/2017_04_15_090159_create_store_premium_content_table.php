<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorePremiumContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_premium_content', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sid');
            $table->string('title');
            $table->text('description');
            $table->boolean('isActive')->default(1);
            $table->integer('c_uid');
            $table->integer('u_uid');
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
        Schema::drop('store_premium_content');
    }
}
