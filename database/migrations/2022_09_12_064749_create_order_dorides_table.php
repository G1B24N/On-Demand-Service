<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDoridesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_dorides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('driver');
            $table->string('lokasi_awal');
            $table->string('tujuan');
            $table->string('jarak');
            $table->string('harga');
            $table->string('durasi');
            $table->integer('status');
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
        Schema::dropIfExists('order_dorides');
    }
}
