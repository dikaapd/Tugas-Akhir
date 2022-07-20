<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = "jurusan";
    protected $primaryKey = "id" ;
    protected $fillable = [
        'id',
        'jabatan',
    ];

    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }
}
