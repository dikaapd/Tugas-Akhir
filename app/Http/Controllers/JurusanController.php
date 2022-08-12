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


class JurusanController extends Controller
{
    //
    public function index()
    {
        $data = Jurusan::all();
        return view('kuota.list', compact('data'));
    }

    
    public function edit($id)
    {
        $data = DB::table('jurusan' )->where('id', $id)->first();
        return view('kuota.edit', compact('data'));
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
                'jurusan' => 'required',
                'kuota' => 'required',
            ]);
                DB::table('jurusan') -> where('id', $id) 
                -> update([
                    'jurusan' => $request->jurusan,
                    'kuota' => $request->kuota,
             ]);

                Alert::success('Selamat', 'Data Berhasil Diubah');

            return redirect ('kuota.list') ;
    }
}
