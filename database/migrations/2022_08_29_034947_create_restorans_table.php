<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestoransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restorans', function (Blueprint $table) {
            $table->increments('id_restoran');
            $table->integer('id_user');
            $table->string('nama_restoran')->nullable();
            $table->string('deskripsi')->nullable();
            $table->integer('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('waktu_pemesanan')->nullable();
            $table->string('kategori')->nullable();
            $table->string('kota')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('maps')->nullable();
            $table->string('foto')->nullable();
            $table->string('cover')->nullable();
            $table->string('author');
            $table->string('jam_kerja')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('restorans');
    }
}
