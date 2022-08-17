@extends('template.app')
@section('content')
    <h3> Halaman Data User </h3>
     <br/>
      <div class="row">
    <!--Grid column-->
    <div class="col-md-6 mb-4">
      <a href="#" class="btn btn-success mr-2" data-toggle="modal" data-target="#ModalCreate">Tambah User Prodi</a>
    </div>
      </div>
     <br/>
  
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Level</th>
      <th scope="col">Username</th>
     
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
            
              <td>
                    <a href="usercontrol/{{$item->id}}" class="btn btn-outline-primary">Reset Password</a>
                </form>
            </td>
        </tr>
    @empty
    @endforelse
  </tbody>
  
</table>
<br>
<div>
  {{$data->links() }}
  </div>

@include('sweetalert::alert')
@include('auth.createmodal')

@endsection