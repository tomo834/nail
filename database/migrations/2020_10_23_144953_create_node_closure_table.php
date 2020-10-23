<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodeClosureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('node_closure', function(Blueprint $table)
		{
			$table->increments('closure_id');
			$table->integer('ancestor')->unsigned()->index('node_closure_ancestor_foreign');
			$table->integer('descendant')->unsigned()->index('node_closure_descendant_foreign');
			$table->integer('depth')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('node_closure');
	}

}
