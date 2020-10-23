<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->bigInteger(''id'', true)->unsigned();
			$table->timestamps(10);
			$table->bigInteger('sales_detail_id')->unsigned()->index('sales_sales_detail_id_foreign');
			$table->bigInteger('user_id')->unsigned()->index('sales_user_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales');
	}

}
