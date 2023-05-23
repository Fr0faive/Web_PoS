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
        Schema::create('absensi', function (Blueprint $table) {
            $table->integer('id_absensi');
            $table->integer('id_pegawai');
            $table->timestamp('tanggal_masuk')->nullable()->default(null);
            $table->timestamp('tanggal_keluar')->nullable()->default(null);
            $table->timestamps();

            $table->primary('id_absensi');
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
        Schema::dropIfExists('absensi');
    }
};
