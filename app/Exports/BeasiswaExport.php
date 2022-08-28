<?php

namespace App\Exports;

use App\Models\Jurusan;
use App\Models\User;
use App\Models\Beasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BeasiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $jurusan = Jurusan::all();
        return Beasiswa::leftjoin('jurusan', 'jurusan.id', '=', 'form_pengajuan_beasiswa.jurusan_id')
        ->select('nama_mhs', 'jurusan', 'nim', 'ttl', 'status')
        ->where('status' , '=' , "diterima")
        ->orWhere('status' , '=' , "ditolak") -> get();
    }
    
    public function headings(): array{
        return ["Nama", "Jurusan", "NIM", "TTL", "Status"];
    }
}

// $shares = DB::table('shares')
//     ->join('users', 'users.id', '=', 'shares.user_id')
//     ->join('followers', 'followers.user_id', '=', 'users.id')
//     ->where('followers.follower_id', '=', 3)
//     ->get();

// $export = DB::table('pendaftaran')
// ->join('users', 'users.id', '=', 'pendaftaran.user_id')
// ->join('pendaftaran_details', 'pendaftaran_details.pendaftaran_id' , "=", 'pendaftaran.id' )
