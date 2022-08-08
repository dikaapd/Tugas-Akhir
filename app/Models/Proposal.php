<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_ormawa';
    protected $primary = 'id';
    protected $fillable = [
        'ormawa_id',
        'nama_kegiatan',
        'jenis_kegiatan',
        'tema_kegiatan',
        'tanggal_kegiatan',
        'total_dana',
        'lampiran',
    ];

    protected$hidden = [];


}
