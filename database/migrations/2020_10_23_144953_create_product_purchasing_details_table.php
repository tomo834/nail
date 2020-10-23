<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchasingDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_purchasing_details', function(Blueprint $table)
		{
			$table->bigInteger(''id'', true)->unsigned();
			$table->bigInteger('product_id')->unsigned()->index('product_purchasing_details_product_foreign');
			$table->integer('amount');
			$table->integer('total');
			$table->dateTime('purchase');
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
		Schema::drop('product_purchasing_details');
	}

}
