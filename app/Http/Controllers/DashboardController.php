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
        // $kuotaprodi=Jurusan::leftJoin('form_pengajuan_beasiswa', 'form_pengajuan_beasiswa.jurusan_id', '=',  'jurusan.id')
        //     ->select('jurusan.jurusan', DB::raw
        //     ('count("form_pengajuan_beasiswa.id") as total ')) 
        //     ->whereNotNull('form_pengajuan_beasiswa.id')
        //     ->groupBy('jurusan')
        //     ->get();
        $sisakuota = DB::select( "SELECT
            jurusan.id, jurusan.jurusan,
            COUNT(CASE WHEN form_pengajuan_beasiswa.status = 'daftar' THEN 1 END) AS total_daftar,
            CASE
                WHEN (jurusan.kuota - COUNT(form_pengajuan_beasiswa.id)) IS NULL THEN jurusan.kuota
                ELSE (jurusan.kuota - COUNT(form_pengajuan_beasiswa.id))
            END AS sisa_kuota FROM jurusan
        LEFT JOIN form_pengajuan_beasiswa ON form_pengajuan_beasiswa.jurusan_id = jurusan.id
        AND form_pengajuan_beasiswa.status = 'daftar' GROUP BY jurusan.id
                ");
      
        return view('dashboard', compact('kuota','total','jumlahkuota','sisakuota'));
   
    }

}