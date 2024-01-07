<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DaftarPoli extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_poli', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_jadwal');
            $table->text('keluhan');
            $table->unsignedBigInteger('no_antrian');

            $table->foreign('id_pasien')->references('id')->on('pasien');
            $table->foreign('id_jadwal')->references('id')->on('jadwal_periksa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_poli');
    }
}
