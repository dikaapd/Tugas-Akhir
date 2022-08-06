<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Jurusan;
use App\Models\Beasiswa;
use Exception;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Beasiswa::where('status' , '=' , "daftar")->get();
        return view('Beasiswa.dashboard', compact('data'));
        
    
    }

    public function index1()
    {
        $data = Beasiswa::where('status' , '=' , "proses")->get();
        return view('Beasiswa.listdiajukan', compact('data'));
        
    
    }

    public function index2()
    {
        $data = Beasiswa::where('status' , '=' , "diterima")->orWhere('status' , '=' , "ditolak")->get();
        return view('Beasiswa.pengumuman', compact('data'));
        
    
    }

    public function ajukan($id, Request $request)                                                                                                                    
    {
        DB::table('form_pengajuan_beasiswa') -> where('id', $id) 
                -> update([
                    'status' => 'proses',
                    'tanggal_proses' => date('Y-m-d H:i:s')
                ]);
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

           return redirect('beasiswa') -> with("Success", "Data Berhasil Di Input") ;
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
            return redirect ('beasiswa') ;
           
    }

    public function download(Request $request,$file)
    {
        return response()->download(public_path('upload'.$file));
    }

    //public function search($nim)
   // {s
        //$data = Beasiswa::where('nim','=', $nim)->get();
    //}
}
