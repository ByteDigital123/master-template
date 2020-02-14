<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses', function(Blueprint $table)
		{
			$table->foreign('provider_id', 'courses_providers_fk')->references('id')->on('providers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses', function(Blueprint $table)
		{
			$table->dropForeign('courses_providers_fk');
		});
	}

}
