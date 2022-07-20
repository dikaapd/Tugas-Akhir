<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPengajuanBeasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_pengajuan_beasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama_mhs');
            $table->string('jurusan_id');
            $table->string('gaji_ortu');
            $table->string('tanggungan');
            $table->string('slip_gaji');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_pengajuan_beasiswa');
    }
}
