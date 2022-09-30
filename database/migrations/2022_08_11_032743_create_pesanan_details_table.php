<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pesanan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id');
            $table->integer('pesanan_id');
            $table->integer('jumlah');
            $table->integer('jumlah_harga');
            $table->integer('id_restoran');
            $table->string('metode_pembayaran')->default('Bayar Tunai');
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
        Schema::dropIfExists('tbl_pesanan_details');
    }
}
