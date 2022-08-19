<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Ormawa;
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
        $ormawa = Ormawa::all();
        //dd($ormawa);
        return view('proposal.create', compact('ormawa'));
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
            'ormawa_id' => 'required',
            'nama_kegiatan' => 'required',
            'jenis_kegiatan' => 'required',
            'tema_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'total_dana' => 'required',
            'lampiran' => 'required|mimes:pdf,docx,png|max:5120'
        ]);

        $lampiran = date('d-m-Y') . '_' . $request->file('lampiran')->getClientOriginalName();
        $path = $request->lampiran->move(public_path('data_proposal'), $lampiran);

        $data = Proposal::create([
            'ormawa_id' => $request->ormawa_id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'tema_kegiatan' => $request->tema_kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'total_dana' => $request->total_dana,
            'lampiran' => $lampiran,
        ]);

        return redirect('proposal');
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
        $ormawa = Ormawa::all();
        $data = DB::table('pengajuan_ormawa')->where('id', $id)->first();
        return view('proposal.edit', compact('data', 'ormawa'));
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
            'ormawa_id' => 'required',
            'nama_kegiatan' => 'required',
            'jenis_kegiatan' => 'required',
            'tema_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'total_dana' => 'required',
            'lampiran' => 'required|mimes:pdf,docx|max:5120'
        ]);

        // $mhs = Proposal::find($id);

        // $mhs = pengajuan::leftjoin('prodi', 'prodi.id_prodi', '=' , 'pengajuan.id_prodi')->where('status', 1) ->where('id_prodi', auth()->user()->id_prodi) -> get();
        //
        $ormawa = Ormawa::all();
        $Proposal = Proposal::where('id', $id)->first();
        if ($request->file != Null) {
            // $request->file->unlink(public_path('upload'), $Proposal->lampiran);
            $file_path = public_path() . '/data_proposal/' . $Proposal->lampiran;
            unlink($file_path);
            $lampiran = date('d-m-Y') . '_' . $request->file('lampiran')->getClientOriginalName();
            $path = $request->lampiran->move(public_path('data_proposal'), $lampiran);
            $ormawa = Ormawa::all();
            DB::table('pengajuan_ormawa')->where('id', $id)
                ->update([
                    'ormawa_id' => $request->ormawa_id,
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'jenis_kegiatan' => $request->jenis_kegiatan,
                    'tema_kegiatan' => $request->tema_kegiatan,
                    'tanggal_kegiatan' => $request->tanggal_kegiatan,
                    'total_dana' => $request->total_dana,
                    'lampiran' => $request->lampiran,
                ]);

            return redirect('proposal');
        }
        $ormawa = Ormawa::all();
        DB::table('pengajuan_ormawa')->where('id', $id)
            ->update([
                'ormawa_id' => $request->ormawa_id,
                'nama_kegiatan' => $request->nama_kegiatan,
                'jenis_kegiatan' => $request->jenis_kegiatan,
                'tema_kegiatan' => $request->tema_kegiatan,
                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                'total_dana' => $request->total_dana,
                'lampiran' => $request->lampiran,
            ]);
        return redirect('proposal');
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


        // $data = Proposal::findOrFail($id);
        //$data = $data->delete();
        $data = DB::table('pengajuan_ormawa')->where('id', '=', $id);
        $file_path = public_path() . '/data_proposal/' . $data->first()->lampiran;
        unlink($file_path);
        $data->delete();
        return redirect('proposal');
    }



    //public function search($id)
    // {
    //$data = Proposal::where('id','=', $id)->get();
    //}
}
