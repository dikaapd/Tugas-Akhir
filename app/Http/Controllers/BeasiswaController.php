<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        $data = Beasiswa::all();

            return view('Beasiswa.dashboard', compact('data'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('beasiswa.create');
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
                'jurusan' => 'required',
                'gaji_ortu' => 'required',
                'tanggungan' => 'required',
                'file' => 'required|mimes:png,jpeg,jpg|max:2048'
            ]);
                
        $fileName = date('d-m-Y').'_'.$request->file('file')->getClientOriginalName();  
        $path = $request->file->move(public_path('upload'), $fileName);
         


            $form_pengajuan_beasiswa = Beasiswa::create([
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mhs,
                'jurusan' => $request->jurusan,
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
        $data = DB::table('form_pengajuan_beasiswa')->where('id', $id)->first();
        return view('beasiswa.edit', compact('data'));
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
                'jurusan' => 'required',
                'gaji_ortu' => 'required',
                'tanggungan' => 'required',
                'file' => 'required|mimes:png,jpeg,jpg|max:2048'
            ]);

            $Beasiswa = Beasiswa::where('id', $id)->first();    
            if($request->file){
                  // $request->file->unlink(public_path('upload'), $Beasiswa->slip_gaji);
                   $file_path = public_path().'/upload/'.$Beasiswa->slip_gaji;
                   unlink($file_path);
                 $fileName = date('d-m-Y').'_'.$request->file('file')->getClientOriginalName();  
                $path = $request->file->move(public_path('upload'), $fileName);
            }
                
        

           // $mhs = Beasiswa::find($id);

           // $mhs = pengajuan::leftjoin('prodi', 'prodi.id_prodi', '=' , 'pengajuan.id_prodi')->where('status', 1) ->where('id_prodi', auth()->user()->id_prodi) -> get();
            //
            DB::table('form_pengajuan_beasiswa') -> where('id', $id) 
            -> update([
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mhs,
                'jurusan' => $request->jurusan,
                'gaji_ortu' => $request->gaji_ortu,
                'tanggungan' => $request->tanggungan,
                'slip_gaji' => $fileName,
            ]);

            return redirect ('beasiswa') ;
    }

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

    //public function search($nim)
   // {s
        //$data = Beasiswa::where('nim','=', $nim)->get();
    //}
}
