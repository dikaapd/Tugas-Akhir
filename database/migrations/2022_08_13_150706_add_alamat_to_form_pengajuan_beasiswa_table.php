<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlamatToFormPengajuanBeasiswaTable extends Migration
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
            $table->string('alamat');
            $table->string('nik');
            $table->string('nohp');
            $table->string('nama_ortu');
            $table->string('ttl');
            $table->string('jenkel');

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
            $table->dropColumn('alamat');
            $table->dropColumn('nik');
            $table->dropColumn('nohp');
            $table->dropColumn('nama_ortu');
            $table->dropColumn('ttl');
            $table->dropColumn('jenkel');
        });
    }
}
