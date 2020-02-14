<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoriesCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categories_courses', function(Blueprint $table)
		{
			$table->foreign('category_id', 'categories_courses_category_fk')->references('id')->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('course_id', 'categories_courses_courses')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categories_courses', function(Blueprint $table)
		{
			$table->dropForeign('categories_courses_category_fk');
			$table->dropForeign('categories_courses_courses');
		});
	}

}
