<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\Beasiswa;
use Exception;
use Excel;
use App\Exports\BeasiswaExport;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
       
        return view('dashboard');
        
    
    }

    public function kuota()
    {
        $kuota = Jurusan::all();
        $total = Beasiswa::count();
        $jumlahkuota = Jurusan::select( DB::raw('SUM(kuota) as total_kuota'))
        ->first();
        $kuotaprodi=Beasiswa::leftJoin('jurusan', 'jurusan.jurusan', '=', 'form_pengajuan_beasiswa.jurusan_id')
            ->select('form_pengajuan_beasiswa.*')
            ->where('status' , '=' , "daftar")
            ->get();
      
        return view('dashboard', compact('kuota','total','jumlahkuota','kuotaprodi'));
    }

}

// return Beasiswa::select('jurusan.jurusan as jurusan','jurusan.kuota as kuota','jurusan.id as id', DB::raw('sum(CASE WHEN form_pengajuan_beasiswa.status = "proses" THEN 1 ELSE 0 END) as jumlahpengajuan'))
// //     ->leftJoin('jurusan', 'jurusan.id', '=', 'form_pengajuan_beasiswa.jurusan_id')
// //     ->where('jurusan.id', '=', $jurusan_id)
// //     ->where('status' , '=' , "daftar")
// //     ->groupBy('jurusan.jurusan', 'jurusan.id','jurusan.kuota')
// //     ->first();
// leftjoin('jurusan', 'jurusan.id', '=', 'form_pengajuan_beasiswa.jurusan_id')
//         ->groupBy('jurusan.jurusan')
//         ->get();
//         ->select('form_pengajuan_beasiswa.*')
//         ->where('status' , '=' , "daftar")
//         ->count()