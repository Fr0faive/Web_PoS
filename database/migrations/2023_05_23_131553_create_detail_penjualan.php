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
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->integer('id_detail_penjualan');
            $table->integer('id_produk');
            $table->integer('id_penjualan');
            $table->integer('qty_produk');
            $table->integer('harga_satuan');
            $table->timestamps();

            $table->primary('id_detail_penjualan');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->foreign('id_penjualan')->references('id_penjualan')->on('penjualan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
