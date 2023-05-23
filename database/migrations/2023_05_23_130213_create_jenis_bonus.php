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
        Schema::create('jenis_bonus', function (Blueprint $table) {
            $table->integer('id_jenis_bonus');
            $table->string('nama_jenis_bonus');
            $table->timestamps();

            $table->primary('id_jenis_bonus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_bonus');
    }
};
