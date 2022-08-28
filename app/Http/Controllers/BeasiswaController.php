<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\Beasiswa;
use Exception;
use Excel;
use App\Exports\BeasiswaExport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pengumumanexport()
    {
        return Excel::download(new BeasiswaExport, 'pengumuman.xlsx');
    }

    public function index(Request $request)
    {

        if (auth()->user()->level == 'prodi') {

            $data = Beasiswa::leftjoin('jurusan', 'jurusan.id', '=', 'form_pengajuan_beasiswa.jurusan_id')
<<<<<<< HEAD
            ->select('form_pengajuan_beasiswa.*')
            ->where('status' , '=' , "daftar")
            ->where('form_pengajuan_beasiswa.jurusan_id', auth()->user()->prodi_id )->get();
=======
                ->select('form_pengajuan_beasiswa.*')
                ->where('status', '=', "daftar")
                ->where('form_pengajuan_beasiswa.jurusan_id', auth()->user()->prodi_id)->paginate();
>>>>>>> 87e9657ac52d3b26b13e0dacdb37ec46ae89dd6b
            return view('Beasiswa.prodidash', compact('data'));
        } else {

            $data = Beasiswa::leftjoin('users', 'form_pengajuan_beasiswa.nim', '=', 'users.nim')
                ->select('form_pengajuan_beasiswa.*')
                ->where('status', '=', "daftar")->paginate();
            return view('Beasiswa.dashboard', compact('data'));
        }
    }



    public function index1()
    {
<<<<<<< HEAD
        if(auth()->user()->level == 'prodi') {

        $data = Beasiswa::leftjoin('jurusan', 'jurusan.id', '=', 'form_pengajuan_beasiswa.jurusan_id')
        ->select('form_pengajuan_beasiswa.*')
        ->where('status' , '=' , "proses")
        ->where('form_pengajuan_beasiswa.jurusan_id', auth()->user()->prodi_id )->paginate();
        return view('Beasiswa.listprodi', compact('data'));
     } else {
        $data = Beasiswa::where('status' , '=' , "proses" )->paginate();
        return view('Beasiswa.listdiajukan', compact('data'));
     }
        
    
=======
        $data = Beasiswa::where('status', '=', "proses")->paginate();
        return view('Beasiswa.listdiajukan', compact('data'));
>>>>>>> 87e9657ac52d3b26b13e0dacdb37ec46ae89dd6b
    }

    public function index2()
    {
        if (auth()->user()->level == 'prodi' or auth()->user()->level == 'admin') {

            $data = Beasiswa::where('status', '=', "diterima")->orWhere('status', '=', "ditolak")->paginate();
            return view('Beasiswa.pengumumanadmin', compact('data'));
        } else {
            $data = Beasiswa::where('status', '=', "diterima")->orWhere('status', '=', "ditolak")->paginate();
            return view('Beasiswa.pengumuman', compact('data'));
        }
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
<<<<<<< HEAD
        WHERE form_pengajuan_beasiswa.status = 'proses'  AND jurusan.id =   $jurusan_id")[0];
=======
        WHERE (form_pengajuan_beasiswa.status = 'proses' OR form_pengajuan_beasiswa.status = 'diterima'
        OR form_pengajuan_beasiswa.status = 'ditolak') AND jurusan.id =   $jurusan_id")[0];
>>>>>>> 87e9657ac52d3b26b13e0dacdb37ec46ae89dd6b
    }

    public function ajukan($id, Request $request)
    {
        // dd($id);
        $beasiswa       = Beasiswa::find($id);
        $kuotajurusan   = $this->kuota($beasiswa->jurusan_id);
        $kuota              = $kuotajurusan->kuota_tersisa;


        if ($kuota > 0) {
            $beasiswa->status           = "Proses";
            $beasiswa->tanggal_proses   = date('Y-m-d H:i:s');
            $beasiswa->save();
            Alert::success('Pengajuan Behasil Dilakukan');
        } else {

            Alert::warning('Pengajuan Ditolak', 'Kuota Sudah Habis');
        }

        return redirect()->back();
    }
    public function terima($id, Request $request)
    {
        DB::table('form_pengajuan_beasiswa')->where('id', $id)
            ->update([
                'status' => 'diterima',
                'tanggal_proses' => date('Y-m-d H:i:s')
            ]);
        return redirect()->back();
    }
    public function tolak($id, Request $request)
    {
<<<<<<< HEAD
        DB::table('form_pengajuan_beasiswa') -> where('id', $id) 
                -> update([
                    'status' => 'ditolak',
                    'tanggal_proses' => date('Y-m-d H:i:s')
                ]);
                Alert::success('Berhasil Ditolak');
=======
        DB::table('form_pengajuan_beasiswa')->where('id', $id)
            ->update([
                'status' => 'ditolak',
                'tanggal_proses' => date('Y-m-d H:i:s')
            ]);
>>>>>>> 87e9657ac52d3b26b13e0dacdb37ec46ae89dd6b
        return redirect()->back();
    }

    public function daftar($id, Request $request)
    {
<<<<<<< HEAD
        DB::table('form_pengajuan_beasiswa') -> where('id', $id) 
                -> update([
                    'status' => 'daftar',
                    'tanggal_proses' => date('Y-m-d H:i:s')
                ]);
                Alert::info('Revisi Berhasil Dilakukan');
        
=======
        DB::table('form_pengajuan_beasiswa')->where('id', $id)
            ->update([
                'status' => 'daftar',
                'tanggal_proses' => date('Y-m-d H:i:s')
            ]);
>>>>>>> 87e9657ac52d3b26b13e0dacdb37ec46ae89dd6b
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
        $users = User::all();
        $jurusan = Jurusan::all();
        // Alert::success('Congrats', 'You\'ve Successfully Registered');
        return view('beasiswa.create', compact('jurusan', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $messages = [
            'required' => 'Tidak Boleh Kosong',
            'min' => 'Minimal 5 Karakter',
            'max' => 'Melebihi Max Karatker',
        ];

            // $request->validate([
         $this->validate($request,[
                'nim' => 'required',
                'nama_mhs' => 'min:5|max:20',
                'jurusan_id' => 'required',
                'gaji_ortu' => 'required',
                'tanggungan' => 'required',
                'nik' => 'required',
                'nohp' => 'required',
                'nama_ortu' => 'required',
                'alamat' => 'required',
                'ttl' => 'required',
                'jenkel' => 'required',
                'ipk' => 'required',
                'thn_ajaran' => 'required',
                'file' => 'required|mimes:png,jpeg,jpg|max:2048'
            ],$messages);
                
        $fileName = date('d-m-Y').'_'.$request->file('file')->getClientOriginalName();  
=======
        $request->validate([
            'nim' => 'required',
            'nama_mhs' => 'required',
            'jurusan_id' => 'required',
            'gaji_ortu' => 'required',
            'tanggungan' => 'required',
            'nik' => 'required',
            'nohp' => 'required',
            'nama_ortu' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'jenkel' => 'required',
            'file' => 'required|mimes:png,jpeg,jpg|max:2048'
        ]);

        $fileName = date('d-m-Y') . '_' . $request->file('file')->getClientOriginalName();
>>>>>>> 87e9657ac52d3b26b13e0dacdb37ec46ae89dd6b
        $path = $request->file->move(public_path('data-slip-gaji'), $fileName);


<<<<<<< HEAD
            $form_pengajuan_beasiswa = Beasiswa::create([
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mhs,
                'jurusan_id' => $request->jurusan_id,
                'gaji_ortu' => $request->gaji_ortu,
                'tanggungan' => $request->tanggungan,
                'nik' => $request->nik,
                'nohp' => $request->nohp,
                'nama_ortu' => $request->nama_ortu,
                'alamat' => $request->alamat,
                'ttl' => $request->ttl,
                'jenkel' => $request->jenkel,
                'ipk' => $request->ipk,
                 'thn_ajaran' => $request->thn_ajaran,
                'slip_gaji' => $fileName,
            ]);
=======
>>>>>>> 87e9657ac52d3b26b13e0dacdb37ec46ae89dd6b

        $form_pengajuan_beasiswa = Beasiswa::create([
            'nim' => $request->nim,
            'nama_mhs' => $request->nama_mhs,
            'jurusan_id' => $request->jurusan_id,
            'gaji_ortu' => $request->gaji_ortu,
            'tanggungan' => $request->tanggungan,
            'nik' => $request->nik,
            'nohp' => $request->nohp,
            'nama_ortu' => $request->nama_ortu,
            'alamat' => $request->alamat,
            'ttl' => $request->ttl,
            'jenkel' => $request->jenkel,
            'slip_gaji' => $fileName,
        ]);


        $users = User::where('id', auth()->user()->id)
            ->update([
                'nim' => $request->nim,
            ]);
        Alert::success('Pengajuan Behasil Dilakukan', 'Hasil Dapat Dilihat Dihalaman Pengumuman Setelah Proses Seleksi');

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
        return view('beasiswa.show', compact('data','jurusan'));
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
        $data = DB::table('form_pengajuan_beasiswa')->where('id', $id)->first();
        return view('beasiswa.edit', compact('data', 'jurusan'));
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
<<<<<<< HEAD
            $request->validate([
                'nim' => 'required',
                'nama_mhs' => 'required',
                'jurusan_id' => 'required',
                'gaji_ortu' => 'required',
                'tanggungan' => 'required',
                'nik' => 'required',
                'nohp' => 'required',
                'nama_ortu' => 'required',
                'alamat' => 'required',
                'ttl' => 'required',
                'jenkel' => 'required',
                'ipk' => 'required',
                'thn_ajaran' => 'required',
                'file ' => 'mimes:png,jpeg,jpg|max:2048'
            ]);
=======
        $request->validate([
            'nim' => 'required',
            'nama_mhs' => 'required',
            'jurusan_id' => 'required',
            'gaji_ortu' => 'required',
            'tanggungan' => 'required',
            'nik' => 'required',
            'nohp' => 'required',
            'nama_ortu' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'jenkel' => 'required',
            'file ' => 'mimes:png,jpeg,jpg|max:2048'
        ]);
        $jurusan = Jurusan::all();
        $Beasiswa = Beasiswa::where('id', $id)->first();
        if ($request->file != Null) {
            // $request->file->unlink(public_path('upload'), $Beasiswa->slip_gaji);
            $file_path = public_path() . '/data-slip-gaji/' . $Beasiswa->slip_gaji;
            unlink($file_path);
            $fileName = date('d-m-Y') . '_' . $request->file('file')->getClientOriginalName();
            $path = $request->file->move(public_path('data-slip-gaji'), $fileName);
>>>>>>> 87e9657ac52d3b26b13e0dacdb37ec46ae89dd6b
            $jurusan = Jurusan::all();
            DB::table('form_pengajuan_beasiswa')->where('id', $id)
                ->update([
                    'nim' => $request->nim,
                    'nama_mhs' => $request->nama_mhs,
                    'jurusan_id' => $request->jurusan_id,
                    'gaji_ortu' => $request->gaji_ortu,
                    'tanggungan' => $request->tanggungan,
                    'nik' => $request->nik,
                    'nohp' => $request->nohp,
                    'nama_ortu' => $request->nama_ortu,
                    'alamat' => $request->alamat,
                    'ttl' => $request->ttl,
                    'jenkel' => $request->jenkel,
                    'ipk' => $request->ipk,
                    'thn_ajaran' => $request->thn_ajaran,
                    'slip_gaji' => $fileName,
                ]);
<<<<<<< HEAD
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
                    'nik' => $request->nik,
                    'nohp' => $request->nohp,
                    'nama_ortu' => $request->nama_ortu,
                    'alamat' => $request->alamat,
                    'ttl' => $request->ttl,
                    'jenkel' => $request->jenkel,
                    'ipk' => $request->ipk,
                    'thn_ajaran' => $request->thn_ajaran,
                    
                ]);
                DB::table('users') -> where('id', auth()->user()->id) 
                -> update([
                    'nim' => $request->nim,  
                ]);
                

                Alert::success( 'Data Berhasil Diubah');
=======
            return redirect('beasiswa');
        }
        $jurusan = Jurusan::all();
        DB::table('form_pengajuan_beasiswa')->where('id', $id)
            ->update([
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mhs,
                'jurusan_id' => $request->jurusan_id,
                'gaji_ortu' => $request->gaji_ortu,
                'tanggungan' => $request->tanggungan,
                'nik' => $request->nik,
                'nohp' => $request->nohp,
                'nama_ortu' => $request->nama_ortu,
                'alamat' => $request->alamat,
                'ttl' => $request->ttl,
                'jenkel' => $request->jenkel,

            ]);
        DB::table('users')->where('id', auth()->user()->id)
            ->update([
                'nim' => $request->nim,
            ]);

>>>>>>> 87e9657ac52d3b26b13e0dacdb37ec46ae89dd6b

        Alert::success('Selamat', 'Data Berhasil Diubah');

        return redirect('beasiswa');
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
        $data = DB::table('form_pengajuan_beasiswa')->where('id', '=', $id);
        $file_path = public_path() . '/data-slip-gaji/' . $data->first()->slip_gaji;
        unlink($file_path);
        $data->delete();
        Alert::success('Data Berhasil Dihapus');
        return redirect('beasiswa');
    }



    //public function search($nim)
    // {s
    //$data = Beasiswa::where('nim','=', $nim)->get();
    //}
}
