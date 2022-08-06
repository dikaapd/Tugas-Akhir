<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToFormPengajuanBeasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_pengajuan_beasiswa', function (Blueprint $table) {
            //
            $table->dateTime('tanggal_proses', $precision = 0)->nullable();
            $table->enum('status' ,['daftar' ,'proses', 'diterima' , 'ditolak'  ])->default('daftar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_pengajuan_beasiswa', function (Blueprint $table) {
            //
            $table->dropColumn('status');
            $table->dropColumn('tanggal_proses');
        });
    }
}
