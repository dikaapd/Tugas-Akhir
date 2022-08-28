@extends('template.app')
@section('content')
     <h3> Pengumuman Proposal/h3>
     <br>
     
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ormawa_id</th>
      <th scope="col">Nama_kegiatan</th>
      <th scope="col">Jenis_kegiatan</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal Ditetapkan</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($data as $key => $item )
        <tr>
            <td>{{$key + 1}} </td>
            <td>{{$item->ormawa->nama}} </td>
            <td>{{$item->nama_kegiatan}} </td>
            <td>{{$item->jenis_kegiatan}} </td>
            <td>{{$item->status}} </td>
            <td>{{$item->tanggal_proses}} </td>
        </tr>
    @empty
    @endforelse
  </tbody>
</table>
<br>
<div>
  {{ $data->links() }}
  </div>
@endsection