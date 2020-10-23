<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('account_id')->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->string('account_name')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('zip-code')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->bigInteger('member_rank_id')->unsigned()->nullable();
            $table->foreign('member_rank_id')->references('id')->on('member_ranks');
            $table->integer('downloads')->nullable();
            $table->integer('purchases')->nullable();
            $table->string('gadget_id')->nullable();
            $table->dateTime('register_gadget')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('account_id');
            $table->dropColumn('admin_id');
            $table->dropColumn('account_name');
            $table->dropColumn('birthday');
            $table->dropColumn('zip_code');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('member_rank_id');
            $table->dropColumn('downloads');
            $table->dropColumn('purchases');
            $table->dropColumn('gadget_id');
            $table->dropColumn('register_gadget');
        });
    }
}
