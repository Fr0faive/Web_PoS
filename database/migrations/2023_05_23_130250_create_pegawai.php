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
            $table->increments('id_pegawai');
            $table->string('nomor_pegawai')->unique();
            $table->string('nama_pegawai');
            $table->integer('id_jabatan')->unsigned();
            $table->integer('gaji_pokok')->nullable();;
            $table->string('password_akun');
            $table->string('remember_token')->nullable();
            $table->fullText('password_akun');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

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
