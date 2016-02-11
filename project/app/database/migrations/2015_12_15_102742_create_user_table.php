<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('tb_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username',60)->unique();
			$table->string('email',120)->unique();
			$table->string('password', 60);
			$table->string('name',60);
			$table->string('tel',12);
			$table->string('type');
			$table->rememberToken();
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
		Schema::drop('tb_users');
	}

}
