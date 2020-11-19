<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSomeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('notification_address')->nullable();
            $table->dropColumn('fax');
            $table->dropColumn('residents_card');
            $table->dropColumn('mailing_date');
            $table->dropColumn('seal_certificate');
            $table->dropColumn('need_file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('notification_address');
            $table->string('fax')->nullable();
            $table->string('need_file')->nullable();
            $table->boolean('seal_certificate')->nullable();
            $table->dateTime('mailing_date')->nullable();
            $table->boolean('residents_card')->nullable();
        });
    }
}
