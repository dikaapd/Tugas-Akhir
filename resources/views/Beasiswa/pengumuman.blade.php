@extends('template.app')
@section('content')
     <h3> Pengumuman Beasiswa</h3>
     <br>
     
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nim</th>
      <th scope="col">Nama</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal Ditetapkan</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($data as $key => $item )
        <tr>
            <td>{{$key + 1}} </td>
            <td>{{$item->nim}} </td>
            <td>{{$item->nama_mhs}} </td>
            <td>{{$item->jurusan->jurusan}} </td>
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