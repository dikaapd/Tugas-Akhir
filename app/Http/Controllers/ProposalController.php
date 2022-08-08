<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        $data = Proposal::all();

            return view('Proposal.dashboard', compact('data'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proposal.create');
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
                'id_ormawa' => 'required',
                'nama_kegiatan' => 'required',
                'jenis_kegiatan' => 'required',
                'tema_kegiatan' => 'required',
                'tgl_kegiatan' => 'required',
                'total_dana' => 'required',
                'file' => 'required'
            ]);

            $data = Proposal::create([
                'id_ormawa' => $request->id_ormawa,
                'nama_kegiatan' => $request->nama_kegiatan,
                'jenis_kegiatan' => $request->jenis_kegiatan,
                'tema_kegiatan' => $request->tema_kegiatan,
                'tgl_kegiatan' => $request->tgl_kegiatan,
                'total_dana' => $request->total_dana,
                'file' => $request->file,
            ]);

           return redirect('proposal') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data = Proposal::where('id','=', $id)->get();
        $data = DB::table('pengajuan_ormawa')->where('id', $id)->first();
        return view('proposal.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('pengajuan_ormawa')->where('id', $id)->first();
        return view('proposal.edit', compact('data'));
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
                'id_ormawa' => 'required',
                'nama_kegiatan' => 'required',
                'jenis_kegiatan' => 'required',
                'tema_kegiatan' => 'required',
                'tgl_kegiatan' => 'required',
                'total_dana' => 'required',
                'file' => 'required'
            ]);

           // $mhs = Proposal::find($id);

           // $mhs = pengajuan::leftjoin('prodi', 'prodi.id_prodi', '=' , 'pengajuan.id_prodi')->where('status', 1) ->where('id_prodi', auth()->user()->id_prodi) -> get();
            //
            DB::table('pengajuan_ormawa') -> where('id', $id) 
            -> update([
            'id_ormawa' => $request->id_ormawa,
            'nama_kegiatan' => $request->nama_kegiatan,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'tema_kegiatan' => $request->tema_kegiatan,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'total_dana' => $request->total_dana,
            'file' => $request->file,
            ]);

            return redirect ('proposal') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
           // $data = Proposal::findOrFail($id);
            //$data = $data->delete();
            $data = DB::table('pengajuan_ormawa')->where('id', '=' , $id)->delete();
            return redirect ('proposal') ;

    }

    //public function search($id)
   // {
        //$data = Proposal::where('id','=', $id)->get();
    //}
}