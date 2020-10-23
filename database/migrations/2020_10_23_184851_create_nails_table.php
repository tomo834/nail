<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('en_name');
            $table->string('jp_name');
            $table->unsignedBigInteger('nail_division_id')->index('nails_division_foreign');
            $table->string('cyan');
            $table->string('magenta');
            $table->string('yellow');
            $table->string('seconds');
            $table->integer('price');
            $table->integer('wholesale');
            $table->integer('divident');
            $table->dateTime('open');
            $table->dateTime('close');
            $table->dateTime('register');
            $table->integer('download');
            $table->integer('review');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nails');
    }
}
