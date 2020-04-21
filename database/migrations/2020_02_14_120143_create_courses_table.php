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
			$table->string('title');
			$table->integer('provider_price')->unsigned();
			$table->integer('retail_price');
			$table->text('description');
			$table->string('excerpt');
			$table->boolean('featured')->default(false);
			$table->integer('duration');
			$table->json('skills_learned')->nullable();
			$table->string('provider_reference_id');
            $table->string('slug')->unique();
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
