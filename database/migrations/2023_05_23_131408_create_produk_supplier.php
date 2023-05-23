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
        Schema::create('produk_supplier', function (Blueprint $table) {
            $table->increments('id_produk_supplier');
            $table->integer('id_produk')->unsigned();
            $table->integer('id_supplier')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            $table->foreign('id_produk')->references('id_produk')->on('produk');
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
        Schema::dropIfExists('produk_supplier');
    }
};
