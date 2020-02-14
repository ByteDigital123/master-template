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
			$table->string('username', 45);
			$table->integer('address_id')->unsigned()->nullable()->index('users_addresses_fk_idx');
			$table->string('email', 45)->unique('email_UNIQUE');
			$table->dateTime('date_of_birth')->nullable();
			$table->string('password');
			$table->string('payment_gateway_reference')->nullable();
			$table->boolean('email_verified')->default(0);
			$table->boolean('private_profile')->default(0);
			$table->string('referral_link')->unique('referral_link_UNIQUE');
			$table->integer('referred_by')->unsigned()->nullable();
			$table->softDeletes();
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
