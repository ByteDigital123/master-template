<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories_courses', function(Blueprint $table)
		{
			$table->integer('category_id')->unsigned();
			$table->integer('course_id')->unsigned()->index('categories_courses_courses_idx');
			$table->primary(['category_id','course_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories_courses');
	}

}
