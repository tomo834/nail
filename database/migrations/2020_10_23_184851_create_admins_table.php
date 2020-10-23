<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('type');
            $table->string('name_jp')->nullable();
            $table->string('company_name')->nullable();
            $table->string('representative')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('shop_pic')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('account_holder')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('account_type')->nullable();
            $table->string('account_number')->nullable();
            $table->integer('incentive')->nullable();
            $table->string('need_file')->nullable();
            $table->boolean('historical_matters')->nullable();
            $table->boolean('seal_certificate')->nullable();
            $table->boolean('passbook')->nullable();
            $table->boolean('residents_card')->nullable();
            $table->boolean('other')->nullable();
            $table->dateTime('mailing_date')->nullable();
            $table->string('account_id')->nullable()->unique();
            $table->string('homepage')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('shop_zip_code')->nullable();
            $table->string('shop_address')->nullable();
            $table->dateTime('request')->nullable();
            $table->string('shop_phone')->nullable();
            $table->string('shop_open')->nullable();
            $table->boolean('has_nailist')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
