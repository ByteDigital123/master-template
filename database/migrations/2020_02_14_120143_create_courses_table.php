<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('provider_id')->unsigned()->index('courses_distributor_fk_idx');
			$table->string('title', 45);
			$table->integer('provider_price')->unsigned();
			$table->integer('retail_price');
			$table->text('description', 65535);
			$table->string('excerpt', 140);
			$table->integer('duration');
			$table->string('main_image')->nullable();
			$table->string('provider_reference_id');
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
		Schema::drop('courses');
	}

}
