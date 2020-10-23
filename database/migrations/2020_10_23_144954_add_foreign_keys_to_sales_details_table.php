<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSalesDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sales_details', function(Blueprint $table)
		{
			$table->foreign('nail_id', 'sales_details_nail_foreign')->references('id')->on('nails')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sales_details', function(Blueprint $table)
		{
			$table->dropForeign('sales_details_nail_foreign');
		});
	}

}
