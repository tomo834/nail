<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToIncentivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incentives', function (Blueprint $table) {
            $table->foreign('admin_id', 'incentive_admin_foreign')->references('id')->on('admins')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('sale_id', 'incentive_sales_foreign')->references('id')->on('sales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incentives', function (Blueprint $table) {
            $table->dropForeign('incentive_admin_foreign');
            $table->dropForeign('incentive_sales_foreign');
        });
    }
}
