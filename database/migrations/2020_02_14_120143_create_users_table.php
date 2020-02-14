<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 45);
			$table->string('last_name', 45);
			$table->string('username', 90)->nullable();
			$table->string('email', 45);
			$table->string('telephone', 45);
			$table->string('api_token')->nullable();
            $table->integer('address_id')->unsigned()->nullable()->index('users_addresses_fk_idx');
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
		Schema::drop('users');
	}

}
