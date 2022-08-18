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

class BeasiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return Beasiswa::select('nama_mhs', 'jurusan_id', 'nim', 'ttl', 'status')
        ->where('status' , '=' , "diterima")
        ->orWhere('status' , '=' , "ditolak") -> get();
    }
    
    public function headings(): array{
        return ["Nama", "Jurusan", "NIM", "TTL", "Status"];
    }
}
