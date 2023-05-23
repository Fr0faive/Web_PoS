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
        Schema::create('produk', function (Blueprint $table) {
            $table->integer('id_produk');
            $table->string('nama_produk');
            $table->integer('id_produk_kategori');
            $table->string('barcode')->unique();
            $table->integer('stok');
            $table->integer('harga');
            $table->timestamps();

            $table->primary('id_produk');
            $table->foreign('id_produk_kategori')->references('id_produk_kategori')->on('produk_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
