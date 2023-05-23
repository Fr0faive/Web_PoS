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
            $table->increments('id_bonus_pegawai');
            $table->integer('id_jenis_bonus')->unsigned();
            $table->integer('id_pegawai')->unsigned();
            $table->integer('jumlah_bonus');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

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
