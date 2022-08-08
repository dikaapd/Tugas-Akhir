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
        'id_ormawa',
        'nama_kegiatan',
        'jenis_kegiatan',
        'tema_kegiatan',
        'tgl_kegiatan',
        'total_dana',
        'file',
    ];

    protected$hidden = [];


}
