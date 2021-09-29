<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('tracking_id');
            $table->integer('c_uid');
            $table->integer('u_uid');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('seo_url');
            $table->string('image_url');
            $table->string('parent_id')->default(0);
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('h1');
            $table->string('h2');
            $table->integer('c_uid');
            $table->integer('u_uid');
            $table->timestamps();
        });

        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('domain');
            $table->string('url');
            $table->string('seo_url');
            $table->string('image_url');
            $table->string('video_url');
            $table->string('discount_value');
            $table->text('description');
            $table->integer('owsid');
            $table->string('apiid');
            $table->integer('nid');
            $table->integer('cid');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('h1');
            $table->string('h2');
            $table->boolean('IsActive');
            $table->integer('c_uid');
            $table->integer('u_uid');
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event');
            $table->string('seo_url');
            $table->string('image_url');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('h1');
            $table->string('h2');
            $table->integer('c_uid');
            $table->integer('u_uid');
            $table->timestamps();
        });

        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('code');
            $table->integer('sid');
            $table->string('url', 512);
            $table->string('image_url');
            $table->string('discount_value');
            $table->date('start_dt');
            $table->date('expire_date');
            $table->date('tn_date');
            $table->boolean('freeshipping');
            $table->boolean('discount');
            $table->boolean('clearance');
            $table->boolean('exclusive');
            $table->boolean('printable');
            $table->boolean('is_top_coupon');
            $table->boolean('sitewide');
            $table->boolean('isDeal');
            $table->boolean('tn_flag');
            $table->integer('c_uid');
            $table->integer('u_uid');
            $table->timestamps();
        });

        Schema::create('cat_stores', function (Blueprint $table) {
            $table->integer('cat_id')->unsigned();
            $table->integer('sid')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sid')->references('id')->on('stores')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['cat_id', 'sid']);
        });

        Schema::create('cat_coupons', function (Blueprint $table) {
            $table->integer('cat_id')->unsigned();
            $table->integer('cid')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cid')->references('id')->on('coupons')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['cat_id', 'cid']);
        });

        Schema::create('eve_coupons', function (Blueprint $table) {
            $table->integer('eid')->unsigned();
            $table->integer('cid')->unsigned();
            $table->foreign('eid')->references('id')->on('events')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cid')->references('id')->on('coupons')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['eid', 'cid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eve_coupons');
        Schema::drop('cat_coupons');
        Schema::drop('cat_stores');
        Schema::drop('coupons');
        Schema::drop('events');
        Schema::drop('stores');
        Schema::drop('categories');
        Schema::drop('networks');
    }
}
