<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');

            //string -> varchar(255)
            $table->string('name'); // Our company
            $table->string('slug_url'); //our-company - company
            $table->boolean('menu')->default(true);
            $table->tinyInteger('menu_order')->unsigned()->default(200);
            $table->string('type'); //page, blog, products, gallery

            $table->boolean('published')->default(false);

            $table->timestamps(); //created_at, update_at
            $table->timestamp('published_at');
            $table->softDeletes(); //deleted_at
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            // table sections -> FK section_id
            $table->integer('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('sections');

            $table->string('title'); // The team
            $table->string('slug_url'); //the-team - team
            $table->tinyInteger('order_num')->unsigned()->default(200);
            $table->text('body'); //content
            $table->string('tab_title');
            $table->mediumText('meta_description')->nullable();

            $table->boolean('published')->default(false);
            $table->boolean('featured')->default(false);

            $table->timestamps(); //created_at, update_at
            $table->timestamp('published_at');
            $table->softDeletes(); //deleted_at
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('pages');
        Schema::drop('sections');
	}

}
