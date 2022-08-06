@extends('template.app')
@section('content')
     Halaman Dashboard
     
<table class="table table-striped">
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

@endsection