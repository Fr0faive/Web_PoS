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
        Schema::create('purchase_order', function (Blueprint $table) {
            $table->increments('id_po');
            $table->string('nomor_po')->unique();
            $table->integer('id_supplier')->unsigned();
            $table->timestamp('tanggal_po')->nullable()->default(null);
            $table->timestamp('tanggal_pengiriman')->nullable()->default(null);
            $table->timestamp('tanggal_penerimaan')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('id_supplier')->references('id_supplier')->on('supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order');
    }
};
