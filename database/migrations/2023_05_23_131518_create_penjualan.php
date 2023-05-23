<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->integer('id_penjualan');
            $table->integer('id_pegawai');
            $table->timestamp('tanggal_penjualan');
            $table->integer('total_harga');
            $table->integer('bayar');
            $table->integer('kembali');
            $table->timestamps();

            $table->primary('id_penjualan');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
};
