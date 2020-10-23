<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_details', function(Blueprint $table)
		{
			$table->bigInteger(''id'', true)->unsigned();
			$table->bigInteger('nail_id')->unsigned()->index('sales_details_nail_foreign');
			$table->integer('amount');
			$table->integer('subtotal');
			$table->integer('discount');
			$table->integer('total');
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
		Schema::drop('sales_details');
	}

}
