<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('nik')->nullable();
            $table->integer('sim')->nullable();
            $table->integer('nohp')->nullable();
            $table->string('nama_driver')->nullable();
            $table->string('alamat')->nullable();
            $table->string('ttl')->nullable();
            $table->string('nama_motor')->nullable();
            $table->string('foto_motor')->nullable();
            $table->string('foto_driver')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('drivers');
    }
}
