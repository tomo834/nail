<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductPurchasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_purchasings', function (Blueprint $table) {
            $table->foreign('admin_id', 'product_purchasing_admin_foreign')->references('id')->on('admins')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('product_purchasing_detail_id', 'product_purchasing_product_purchasing_detail_foreign')->references('id')->on('product_purchasing_details')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('product_purchasing_division_id')->references('id')->on('product_purchasing_divisions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_purchasings', function (Blueprint $table) {
            $table->dropForeign('product_purchasing_admin_foreign');
            $table->dropForeign('product_purchasing_product_purchasing_detail_foreign');
            $table->dropForeign('product_purchasings_product_purchasing_division_id_foreign');
        });
    }
}
