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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->integer('id_pegawai');
            $table->string('nomor_pegawai')->unique();
            $table->string('nama_pegawai');
            $table->integer('id_jabatan');
            $table->string('password_akun');
            $table->fullText('password_akun');
            $table->timestamps();

            $table->primary('id_pegawai');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
