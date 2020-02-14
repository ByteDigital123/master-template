<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_forms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 45);
			$table->string('last_name', 45);
			$table->string('email', 45);
			$table->text('message', 65535);
			$table->boolean('agreed_to_marketing')->default(0);
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
		Schema::drop('contact_forms');
	}

}
