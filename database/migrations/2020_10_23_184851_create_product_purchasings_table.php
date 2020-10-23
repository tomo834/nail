<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchasings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('admin_id')->index('product_purchasing_admin_foreign');
            $table->unsignedBigInteger('product_purchasing_detail_id')->index('product_purchasing_product_purchasing_detail_foreign');
            $table->timestamps();
            $table->string('order_id')->nullable();
            $table->unsignedBigInteger('product_purchasing_division_id')->index('product_purchasings_product_purchasing_division_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_purchasings');
    }
}
