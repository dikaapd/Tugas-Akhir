<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPengajuanProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_pengajuan_proposal', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ormawa');
            $table->string('tujuan_kegiatan');
            $table->date('tgl_awalkegiatan');
            $table->date('tgl_akhirkegiatan');
            $table->integer('anggaran_dana');
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
        Schema::dropIfExists('form_pengajuan_proposal');
    }
}
