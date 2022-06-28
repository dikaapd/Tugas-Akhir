<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;

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
        try {
        $data = Beasiswa::all();

        if($data){
            return ApiFormatter::createApi(200, 'Succes', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');

        }
    } catch(Exception $error) {
        return ApiFormatter::createApi(400, 'Failed');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
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

            $data = Beasiswa::where('id','=', $form_pengajuan_beasiswa->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Succes', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');

            }
        } catch(Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Beasiswa::where('id','=', $id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Succes', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');

            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nim' => 'required',
                'nama_mhs' => 'required',
                'jurusan' => 'required',
                'gaji_ortu' => 'required',
                'tanggungan' => 'required',
                'slip_gaji' => 'required'
            ]);

            $form_pengajuan_beasiswa = Beasiswa::findOrFail($id);

            $form_pengajuan_beasiswa -> update([
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mhs,
                'jurusan' => $request->jurusan,
                'gaji_ortu' => $request->gaji_ortu,
                'tanggungan' => $request->tanggungan,
                'slip_gaji' => $request->slip_gaji,
            ]);

            $data = Beasiswa::where('id','=', $form_pengajuan_beasiswa->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Succes', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');

            }
        } catch(Exception $error) {
            return ApiFormatter::createApi(400, 'Gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Beasiswa::findOrFail($id);
            $data = $data->delete();

            if($data){
                return ApiFormatter::createApi(200, 'Succes Destroy Data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function search($nim)
    {
        $data = Beasiswa::where('nim','=', $nim)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Succes', $data = Beasiswa::all());
            } else {
                return ApiFormatter::createApi(400, 'Failed');

            }
    }
}
