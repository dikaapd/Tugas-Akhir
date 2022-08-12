<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Jurusan;
use App\Models\Beasiswa;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data = Beasiswa::where('status' , '=' , "daftar")->paginate(7);
        return view('Beasiswa.dashboard', compact('data'));
    }

    public function index1()
    {
        $data = Beasiswa::where('status' , '=' , "proses")->paginate(7);
        return view('Beasiswa.listdiajukan', compact('data'));
        
    
    }

    public function index2()
    {
        $data = Beasiswa::where('status' , '=' , "diterima")->orWhere('status' , '=' , "ditolak")->paginate(7);
        return view('Beasiswa.pengumuman', compact('data'));
        
    
    }

    // private function kuota($jurusan_id)
    // {
    //     return Beasiswa::select('jurusan.jurusan as jurusan','jurusan.kuota as kuota','jurusan.id as id', DB::raw('sum(CASE WHEN form_pengajuan_beasiswa.status = "proses" THEN 1 ELSE 0 END) as jumlahpengajuan'))
    //     ->leftJoin('jurusan', 'jurusan.id', '=', 'form_pengajuan_beasiswa.jurusan_id')
    //     ->where('jurusan.id', '=', $jurusan_id)
    //     ->where('status' , '=' , "daftar")
    //     ->groupBy('jurusan.jurusan', 'jurusan.id','jurusan.kuota')
    //     ->first();
    // }

    // private function kuota($jurusan_id)
    // {
    //     return DB::raw("SELECT (jurusan.kuota - COUNT(form_pengajuan_beasiswa.id)) AS kuota_tersisa FROM form_pengajuan_beasiswa INNER JOIN jurusan ON form_pengajuan_beasiswa.jurusan_id = jurusan.id WHERE form_pengajuan_beasiswa.status = 'proses' AND form_pengajuan_beasiswa.jurusan_id = 3")
    //     ->leftJoin('jurusan', 'jurusan.id', '=', 'form_pengajuan_beasiswa.jurusan_id')
    //     ->where('jurusan.id', '=', $jurusan_id)
    //     ->where('status' , '=' , "daftar")
    //     ->groupBy('jurusan.jurusan', 'jurusan.id','jurusan.kuota')
    //     ->first()->kuota_tersisa;
    // }
    private function kuota($jurusan_id)
    {
        return DB::select("SELECT
        CASE
            WHEN (jurusan.kuota - COUNT(form_pengajuan_beasiswa.id)) IS NULL THEN jurusan.id
            ELSE (jurusan.kuota - COUNT(form_pengajuan_beasiswa.id))
        END AS kuota_tersisa
    FROM form_pengajuan_beasiswa INNER JOIN jurusan ON form_pengajuan_beasiswa.jurusan_id = jurusan.id
    WHERE form_pengajuan_beasiswa.status = 'proses' AND jurusan.id =   $jurusan_id")[0];
    }

    public function ajukan($id, Request $request)                                                                                                                    
    { 
        // dd($id);
        $beasiswa       = Beasiswa::find($id);
        $kuotajurusan   = $this->kuota($beasiswa->jurusan_id); 
        $kuota              = $kuotajurusan->kuota_tersisa;
        

        if($kuota > 0 ){
            $beasiswa->status           = "Proses";
            $beasiswa->tanggal_proses   = date('Y-m-d H:i:s');
            $beasiswa->save();
            Alert::success('Pengajuan Berhasil', 'Info Message');
        } 
        else {
            
            Alert::warning('Pengajuan Ditolak', 'Kuota Sudah Habis');
        }
        
        return redirect()->back();
        
    }
    public function terima($id, Request $request)                                                                                                                    
    {
        DB::table('form_pengajuan_beasiswa') -> where('id', $id) 
                -> update([
                    'status' => 'diterima',
                    'tanggal_proses' => date('Y-m-d H:i:s')
                ]);
        return redirect()->back();
    
    }
    public function tolak($id, Request $request)                                                                                                                    
    {
        DB::table('form_pengajuan_beasiswa') -> where('id', $id) 
                -> update([
                    'status' => 'ditolak',
                    'tanggal_proses' => date('Y-m-d H:i:s')
                ]);
        return redirect()->back();
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jurusan = Jurusan::all();
        // Alert::success('Congrats', 'You\'ve Successfully Registered');  
        return view('beasiswa.create' , compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'nim' => 'required',
                'nama_mhs' => 'required',
                'jurusan_id' => 'required',
                'gaji_ortu' => 'required',
                'tanggungan' => 'required',
                'file' => 'required|mimes:png,jpeg,jpg|max:2048'
            ]);
                
        $fileName = date('d-m-Y').'_'.$request->file('file')->getClientOriginalName();  
        $path = $request->file->move(public_path('upload'), $fileName);
         


            $form_pengajuan_beasiswa = Beasiswa::create([
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mhs,
                'jurusan_id' => $request->jurusan_id,
                'gaji_ortu' => $request->gaji_ortu,
                'tanggungan' => $request->tanggungan,
                'slip_gaji' => $fileName,
            ]);
            Alert::success('Selamat', 'Pengajuan Behasil Dilakukan');

            return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data = Beasiswa::where('id','=', $id)->get();
        $jurusan = Jurusan::all();
        $data = DB::table('form_pengajuan_beasiswa')->where('id', $id)->first();
        return view('beasiswa.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::all();
        $data = DB::table('form_pengajuan_beasiswa' )->where('id', $id)->first();
        return view('beasiswa.edit', compact('data' , 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
            $request->validate([
                'nim' => 'required',
                'nama_mhs' => 'required',
                'jurusan_id' => 'required',
                'gaji_ortu' => 'required',
                'tanggungan' => 'required',
                'file ' => 'mimes:png,jpeg,jpg|max:2048'
            ]);
            $jurusan = Jurusan::all();
            $Beasiswa = Beasiswa::where('id', $id)->first();    
            if ($request->file != Null){
                  // $request->file->unlink(public_path('upload'), $Beasiswa->slip_gaji);
                   $file_path = public_path().'/upload/'.$Beasiswa->slip_gaji;
                   unlink($file_path);
                 $fileName = date('d-m-Y').'_'.$request->file('file')->getClientOriginalName();  
                $path = $request->file->move(public_path('upload'), $fileName);
                $jurusan = Jurusan::all();
                DB::table('form_pengajuan_beasiswa') -> where('id', $id) 
                -> update([
                    'nim' => $request->nim,
                    'nama_mhs' => $request->nama_mhs,
                    'jurusan_id' => $request->jurusan_id,
                    'gaji_ortu' => $request->gaji_ortu,
                    'tanggungan' => $request->tanggungan,
                    'slip_gaji' => $fileName,
                ]);
                return redirect ('beasiswa') ;
            }
            $jurusan = Jurusan::all();
                DB::table('form_pengajuan_beasiswa') -> where('id', $id) 
                -> update([
                    'nim' => $request->nim,
                    'nama_mhs' => $request->nama_mhs,
                    'jurusan_id' => $request->jurusan_id,
                    'gaji_ortu' => $request->gaji_ortu,
                    'tanggungan' => $request->tanggungan,
                    
                ]);
                Alert::success('Selamat', 'Data Berhasil Diubah');

            return redirect ('beasiswa') ;
    }
                
           // $mhs = Beasiswa::find($id);

           // $mhs = pengajuan::leftjoin('prodi', 'prodi.id_prodi', '=' , 'pengajuan.id_prodi')->where('status', 1) ->where('id_prodi', auth()->user()->id_prodi) -> get();
            //
           

           

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
           // $data = Beasiswa::findOrFail($id);
            //$data = $data->delete();
            $data = DB::table('form_pengajuan_beasiswa')->where('id', '=' , $id);
            $file_path = public_path().'/upload/'.$data->first()->slip_gaji;
            unlink($file_path);
            $data->delete();
             Alert::success( 'Data Berhasil Dihapus');
            return redirect ('beasiswa') ;
           
    }

    

    //public function search($nim)
   // {s
        //$data = Beasiswa::where('nim','=', $nim)->get();
    //}
}
