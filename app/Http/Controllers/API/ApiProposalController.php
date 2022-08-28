<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;

use App\Models\Proposal;
use Exception;
use Illuminate\Http\Request;

class ApiProposalController extends Controller
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

            if ($data) {
                return ApiFormatter::createApi(200, 'Succes', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
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
        $fileName = time() . $request->file('lampiran')->getClientOriginalName();
        $path = $request->file('lampiran')->move('data_proposal', $fileName);
        $validasi['lampiran'] = $path;

        $proposal = new Proposal();
        $proposal->ormawa_id = $request->ormawa_id;
        $proposal->nama_kegiatan = $request->nama_kegiatan;
        $proposal->jenis_kegiatan = $request->jenis_kegiatan;
        $proposal->tema_kegiatan = $request->tema_kegiatan;
        $proposal->tanggal_kegiatan = $request->tanggal_kegiatan;
        $proposal->total_dana = $request->total_dana;
        $proposal->lampiran = $path;

        $proposal->save();

        return ApiFormatter::createApi(200, 'Data Berhasil Dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Proposal::where('id', '=', $id)->get();

        if ($data) {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search($ormawa_id)
    {
        $data = Proposal::where('ormawa_id', '=', $ormawa_id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Succes', $data = Proposal::all());
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
