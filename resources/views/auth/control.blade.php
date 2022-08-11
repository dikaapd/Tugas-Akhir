@extends('template.app')
@section('content')
    <h3> Halaman Data User </h3>
     <br/>
      <div class="row">
    <!--Grid column-->
    <div class="col-md-6 mb-4">
      <form class="form-inline md-form mr-auto">
        <form action= "usercontrol/cari" method="GET">
        <input class="form-control mr-sm-2"  name="cari" type="text" value="{{ old('cari') }}" placeholder="Search" aria-label="Search">
        <button type="submit" class="btn btn-info mr-2">Cari</button>
      </form>
      </form>
    </div>
    {{-- <div class="col-md-6 mb-4">
    </div>
    <div class="col-md-6 mb-4">
      <a href="" class="btn btn-success mr-2" data-toggle="modal" data-target="#ModalCreate">Tambah User Prodi</a>
    </div> --}}
      </div>
     <br/>
  
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Level</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th cscope="col" >Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($data as $key => $item )
        <tr>
            <td>{{$key + 1}} </td>
            <td>{{$item->nama}} </td>
            <td>{{$item->level}} </td>
            <td>{{$item->username}} </td>
            <td>{{$item->password}} </td>
              <td>
                    <a href="usercontrol/{{$item->id}}" class="btn btn-outline-info btn-sm">Reset Password</a>
                </form>
            </td>
        </tr>
    @empty
    @endforelse
  </tbody>
</table>
<br>
@include('auth.createmodal')
@endsection