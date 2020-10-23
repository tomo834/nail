<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncentivesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incentives', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('admin_id')->unsigned()->index('incentive_admin_foreign');
			$table->bigInteger('sale_id')->unsigned()->index('incentive_sales_foreign');
			$table->integer('incentive');
			$table->dateTime('receive');
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
		Schema::drop('incentives');
	}

}
