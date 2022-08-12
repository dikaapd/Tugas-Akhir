@extends('template.app')

@section('content')
<p align="center"> Halaman Dashboard </p>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"><p align="center">No</p</th>
      <th scope="col"><p align="center">Ormawa</p</th>
      <th scope="col"><p align="center">Nama_Kegiatan</p</th>
      <th scope="col"><p align="center">Jenis_Kegiatan</p</th>
      <th scope="col"><p align="center">Action</p></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($data as $key => $item )
        <tr>
            <td>{{$key + 1}} </td>
            <td>{{$item->ormawa_id}} </td>
            <td>{{$item->nama_kegiatan}} </td>
            <td>{{$item->jenis_kegiatan}} </td>
            <td>
                
                <form action="/proposal/{{$item->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/proposal/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                <a href="/proposal/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <input type="submit" class="btn btn-warning btn-sm" value="Delete">
                    
                </form>
            </td>
        </tr>
    @empty
    @endforelse
  </tbody>
</table>
<br>

@endsection