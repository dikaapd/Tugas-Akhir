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
        'jurusan',
    ];

    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }

    // public function user()
    // {
    //     return $this->hasMany(User::class);
    // }
    public function prodi()
    {
        return $this->belongsTo(User::class,'prodi_id' );
    }
}
