@extends('template.app')
@section('content')
    <h3> Halaman Data User </h3>
     <br/>
      <div class="row">
    <!--Grid column-->
    <div class="col-md-6 mb-4">
      <a href="#" class="btn btn-success sm-2" data-toggle="modal" data-target="#ModalCreate">
        <i class='mdi mdi-account-multiple-plus'></i>
        Tambah User Prodi</a>
    </div>
      </div>
     <br/>
  
     <table id="example" class="table table-striped t " style="width:100%">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Level</th>
      <th scope="col">Username</th>
      <th scope="col">Prodi</th>
     
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
              @if ($item->prodi==null)
                  -
              @else
              {{$item->prodi->jurusan}}
              @endif
               </td>
            
              <td>
                    <a href="usercontrol/{{$item->id}}" class="btn btn-outline-dark">
                      <i class='mdi mdi-account-convert'></i>
                      Reset Password
                    </a>
                    
                </form>
            </td>
        </tr>
    @empty
    @endforelse
  </tbody>
</table>
<br>
{{-- <div>
  {{$data->links() }}
  </div> --}}
  <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Create New User') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>                    
            </div>
            <div class="modal-body">
              <form action="{{route('postregistrasimodal')}}" method="post" enctype="multipart/form-data">
                @csrf
                <form class="pt-3">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" name = "nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                    <select class="form-control" name="level" id="level" placeholder="level">
                      <option > Level</option>
                      <option value="prodi">Prodi</option>
                      <option value="admin">Admin</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <input type="username" class="form-control form-control-lg" name="username"  placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                    </div>
                    <div class="form-group ">
                        <select class="form-control form-control-lg"  name="prodi_id"  placeholder="Pilih Prodi">
                            <option disable value> Prodi </option>
                            @foreach ($prodi as $item)
                              <option value="{{$item->id}}">{{$item->jurusan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Daftar</button>
                    </div>
                </form>
            </div>
          </div>
    </div>
</div>

@include('sweetalert::alert')

@endsection