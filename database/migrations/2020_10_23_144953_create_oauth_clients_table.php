<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOauthClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oauth_clients', function(Blueprint $table)
		{
			$table->bigInteger(''id'', true)->unsigned();
			$table->bigInteger('user_id')->unsigned()->nullable()->index();
			$table->string('name');
			$table->string(''secret'', 100)->nullable();
			$table->string('provider')->nullable();
			$table->text('redirect');
			$table->boolean('personal_access_client');
			$table->boolean('password_client');
			$table->boolean('revoked');
			$table->timestamps(10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oauth_clients');
	}

}
