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
                'slip_gaji' => 'required'
            ]);

            $form_pengajuan_beasiswa = Beasiswa::create([
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mhs,
                'jurusan' => $request->jurusan,
                'gaji_ortu' => $request->gaji_ortu,
                'tanggungan' => $request->tanggungan,
                'slip_gaji' => $request->slip_gaji,
            ]);

           return redirect('beasiswa') ;
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
                'slip_gaji' => 'required'
            ]);

            //$form_pengajuan_beasiswa = Beasiswa::findOrFail($id);

            DB::table('form_pengajuan_beasiswa') -> where('id', $id) 
            -> update([
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mhs,
                'jurusan' => $request->jurusan,
                'gaji_ortu' => $request->gaji_ortu,
                'tanggungan' => $request->tanggungan,
                'slip_gaji' => $request->slip_gaji,
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
            $data = DB::table('form_pengajuan_beasiswa')->where('id', '=' , $id)->delete();
            return redirect ('beasiswa') ;

    }

    public function search($nim)
    {
        $data = Beasiswa::where('nim','=', $nim)->get();
    }
}
