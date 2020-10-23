<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductIncentivesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_incentives', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('admin_id')->unsigned()->index('product_incentive_admin_foreign');
			$table->integer('incentive');
			$table->dateTime('receive');
			$table->timestamps(10);
			$table->bigInteger('product_purchasing_id')->unsigned()->index('product_incentives_product_purchasing_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_incentives');
	}

}
