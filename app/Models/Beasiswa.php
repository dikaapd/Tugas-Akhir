<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $table = 'form_pengajuan_beasiswa';
    //protected $primary = 'id';
    protected $fillable = [
        'nim',
        'nama_mhs',
        'jurusan_id',
        'gaji_ortu',
        'tanggungan',
        'slip_gaji',
        'status',
        'tanggal_proses',
    ];
    protected $hidden = [];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
