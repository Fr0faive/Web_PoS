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
        Schema::create('po_produk', function (Blueprint $table) {
            $table->increments('id_po_produk');
            $table->integer('id_produk')->unsigned();
            $table->integer('id_po')->unsigned();
            $table->integer('qty_produk');
            $table->integer('harga_satuan');
            $table->timestamps();

            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->foreign('id_po')->references('id_po')->on('purchase_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('po_produk');
    }
};
