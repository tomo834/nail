<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductIncentivesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_incentives', function(Blueprint $table)
		{
			$table->foreign('admin_id', 'product_incentive_admin_foreign')->references('id')->on('admins')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_purchasing_id')->references('id')->on('product_purchasings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_incentives', function(Blueprint $table)
		{
			$table->dropForeign('product_incentive_admin_foreign');
			$table->dropForeign('product_incentives_product_purchasing_id_foreign');
		});
	}

}
