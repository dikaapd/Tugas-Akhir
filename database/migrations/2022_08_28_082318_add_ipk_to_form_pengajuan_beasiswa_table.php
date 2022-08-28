<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpkToFormPengajuanBeasiswaTable extends Migration
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
            $table->string('ipk');
            $table->string('thn_ajaran');
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
            $table->dropColumn('ipk');
            $table->dropColumn('thn_ajaran');

        });
    }
}
