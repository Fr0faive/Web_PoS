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
        Schema::create('bonus_pegawai', function (Blueprint $table) {
            $table->integer('id_bonus_pegawai');
            $table->integer('id_jenis_bonus');
            $table->integer('id_pegawai');
            $table->integer('jumlah_bonus');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->timestamps();

            $table->primary('id_bonus_pegawai');
            $table->foreign('id_jenis_bonus')->references('id_jenis_bonus')->on('jenis_bonus');
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
        Schema::dropIfExists('bonus_pegawai');
    }
};
