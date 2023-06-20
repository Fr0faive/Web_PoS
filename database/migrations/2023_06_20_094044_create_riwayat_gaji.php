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
        Schema::create('riwayat_gaji', function (Blueprint $table) {
            $table->increments('id_riwayat_gaji');
            $table->integer('id_pegawai')->unsigned();
            $table->integer('gaji_pokok');
            // $table->integer('absensi');
            $table->integer('bulan')->unsigned();
            $table->integer('tahun')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

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
        Schema::dropIfExists('riwayat_gaji');
    }
};
