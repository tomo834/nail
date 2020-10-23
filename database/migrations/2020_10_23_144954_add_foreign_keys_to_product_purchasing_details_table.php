<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductPurchasingDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_purchasing_details', function(Blueprint $table)
		{
			$table->foreign('product_id', 'product_purchasing_details_product_foreign')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_purchasing_details', function(Blueprint $table)
		{
			$table->dropForeign('product_purchasing_details_product_foreign');
		});
	}

}
