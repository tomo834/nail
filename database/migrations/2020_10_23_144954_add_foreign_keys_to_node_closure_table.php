<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNodeClosureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('node_closure', function(Blueprint $table)
		{
			$table->foreign('ancestor')->references('id')->on('nodes')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('descendant')->references('id')->on('nodes')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('node_closure', function(Blueprint $table)
		{
			$table->dropForeign('node_closure_ancestor_foreign');
			$table->dropForeign('node_closure_descendant_foreign');
		});
	}

}
