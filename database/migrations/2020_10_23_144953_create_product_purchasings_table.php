<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchasingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_purchasings', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('admin_id')->unsigned()->index('product_purchasing_admin_foreign');
			$table->bigInteger('product_purchasing_detail_id')->unsigned()->index('product_purchasing_product_purchasing_detail_foreign');
			$table->timestamps(10);
			$table->string('order_id')->nullable();
			$table->bigInteger('product_purchasing_division_id')->unsigned()->index('product_purchasings_product_purchasing_division_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_purchasings');
	}

}
