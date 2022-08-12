@extends('template.app')
@section('content')

    <h3> Halaman Kuota Prodi </h3>
     <br/>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Prodi</th>
      <th scope="col">Kuota</th>
      <th cscope="col" >Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($data as $key => $item )
        <tr>
            <td>{{$key + 1}} </td>
            <td>{{$item->jurusan}} </td>
            <td>{{$item->kuota}} </td>
            <td>
                <button href="#" class="btn btn-success mr-2" data-toggle="modal" data-target="#ModalEdit">Edit</button>
            </td>
        </tr>

    @empty
    @endforelse
  </tbody>
</table>
<br>
@endsection