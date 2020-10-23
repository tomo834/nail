<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nails', function (Blueprint $table) {
            $table->foreign('nail_division_id', 'nails_division_foreign')->references('id')->on('nail_divisions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nails', function (Blueprint $table) {
            $table->dropForeign('nails_division_foreign');
        });
    }
}
