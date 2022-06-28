<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $table = 'form_pengajuan_proposal';
    protected $primary = 'id';
    protected $fillable = [
        'nama_ormawa',
        'tujuan_kegiatan',
        'tgl_awalkegiatan',
        'tgl_akhirkegiatan',
        'anggaran_dana',
    ];

    protected$hidden = [];
}
