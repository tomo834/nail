<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('register_devices', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('device_code');
			$table->integer('admin_id')->unsigned()->index('register_devices_admin_id_foreign');
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
		Schema::drop('register_devices');
	}

}
