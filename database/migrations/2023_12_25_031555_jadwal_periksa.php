<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JadwalPeriksa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_periksa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dokter');
            $table->enum('hari', ['Senin', 'Selasa','Rabu','Kamis','Jumat','Sabtu']);
            $table->time('jam_mulai', $precision = 0);
            $table->time('jam_selesai', $precision = 0);

            $table->foreign('id_dokter')->references('id')->on('dokter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_periksa');
    }
}
