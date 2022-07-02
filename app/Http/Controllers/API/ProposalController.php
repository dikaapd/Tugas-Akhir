<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;

use App\Models\Proposal;
use Exception;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
        $data = Proposal::all();

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
                'id' => 'required',
                'nama_ormawa' => 'required',
                'tujuan_kegiatan' => 'required',
                'tgl_awalkegiatan' => 'required',
                'tgl_akhirkegiatan' => 'required',
                'anggaran_dana' => 'required'
            ]);

            $form_pengajuan_proposal = Proposal::create([
                'id' => $request->id,
                'nama_ormawa' => $request->nama_ormawa,
                'tujuan_kegiatan' => $request->tujuan_kegiatan,
                'tgl_awalkegiatan' => $request->tgl_awalkegiatan,
                'tgl_akhirkegiatan' => $request->tgl_akhirkegiatan,
                'anggaran_dana' => $request->anggaran_dana,
            ]);

            $data = Proposal::where('id','=', $form_pengajuan_proposal->id)->get();

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
        $data = Proposal::where('id','=', $id)->get();

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
            'id' => 'required',
            'nama_ormawa' => 'required',
            'tujuan_kegiatan' => 'required',
            'tgl_awalkegiatan' => 'required',
            'tgl_akhirkegiatan' => 'required',
            'anggaran_dana' => 'required'
            ]);

            $form_pengajuan_proposal = Proposal::findOrFail($id);

            $form_pengajuan_proposal -> update([
            'id' => $request->id,
            'nama_ormawa' => $request->nama_ormawa,
            'tujuan_kegiatan' => $request->tujuan_kegiatan,
            'tgl_awalkegiatan' => $request->tgl_awalkegiatan,
            'tgl_akhirkegiatan' => $request->tgl_akhirkegiatan,
            'anggaran_dana' => $request->anggaran_dana,
            ]);

            $data = Proposal::where('id','=', $form_pengajuan_proposal->id)->get();

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
            $data = Proposal::findOrFail($id);
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

    public function search($nama_ormawa)
    {
        $data = Proposal::where('nama_ormawa','=', $nama_ormawa)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Succes', $data = Proposal::all());
            } else {
                return ApiFormatter::createApi(400, 'Failed');

            }
    }
}
