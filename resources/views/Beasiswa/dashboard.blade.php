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
    </tr>
  </thead>
  <tbody>
    @forelse ($data as $key => $item )
        <tr>
            <td>{{$key + 1}} </td>
            <td>{{$item->nim}} </td>
            <td>{{$item->nama_mhs}} </td>
            <td>{{$item->jurusan}} </td>
            <td>
                
                <form action="/beasiswa/{{$item->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/beasiswa/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                <a href="/beasiswa/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
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