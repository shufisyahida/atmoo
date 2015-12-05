<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Atm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bank')->unsigned();
            $table->string('nama_atm');
            $table->string('alamat');
            $table->string('lng');
            $table->string('lat');
            $table->string('status');
            $table->foreign('id_bank')->references('id')->on('bank');
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
        Schema::drop('atm');
    }
}
