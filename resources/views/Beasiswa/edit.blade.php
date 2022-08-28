@extends('template.app')


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Plugin css for this page -->
 <link rel="stylesheet" href="{{asset('layout/vendors/feather/feather.css')}}">
 <link rel="stylesheet" href="{{asset('layout/vendors/ti-icons/css/themify-icons.css')}}">
 <link rel="stylesheet" href="{{asset('layout/vendors/css/vendor.bundle.base.css')}}">
 <!-- endinject -->
 <!-- Plugin css for this page -->
 <link rel="stylesheet" href="{{asset('layout/vendors/select2/select2.min.css')}}">
 <link rel="stylesheet" href="{{asset('layout/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
 <!-- End plugin css for this page -->
 <!-- inject:css -->
 <link rel="stylesheet" href="{{asset('layout/css/vertical-layout-light/style.css')}}">
 <link rel="stylesheet" href="{{asset('layout/vendors/select2/select2.min.css')}}">
 <link rel="stylesheet" href="{{asset('layout/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
 <!-- End plugin css for this page -->
 <!-- inject:css -->
 @section('content')
 <div class="col-12 ">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('update_data', $data->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
      <h4 class="card-title">Input Data Mahasiswa</h4>
      <form class="form-sample">
        <p class="card-description">
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">NIM</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->nim}}" name="nim" id="nim" placeholder="Nim">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->nama_mhs}}" name="nama_mhs" id="nama_mhs" placeholder="Nama Lengkap">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <select class="form-control" name="jenkel" id="jenkel" placeholder="jenkel">
                  <option > Jenis Kelamin</option>
                  @if($data->jenkel == "Pria")
                  <option value="Pria" selected>Pria</option>
                  <option value="Wanita">Wanita</option>
                  @else
                  <option value="Pria">Pria</option>
                  <option value="Wanita" selected>Wanita</option>
                  @endif
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tempat Tanggal Lahir</label>
              <div class="col-sm-9">
                <input class="form-control" name="ttl" value="{{$data->ttl}}" id="ttl" placeholder="dd/mm/yyyy"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jurusan</label>
              <div class="col-sm-9">
                <select class="form-control"  name="jurusan_id" id="jurusan_id">
                    <option disable value> Prodi </option>
                    @foreach ($jurusan as $item)
                    @if($data->jurusan_id == $item->id)
                    <option value="{{$item->id}}" selected>{{$item->jurusan}}</option>
                    @endif
                    <option value="{{$item->id}}">{{$item->jurusan}}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">IPK Terakhir</label>
              <div class="col-sm-9">
                <input class="form-control" name="ipk" value="{{$data->ipk}}" id="ipk">
              </div>
            </div>
          </div>
        </div>
        <p class="card-description">
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tahun Ajaran</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->thn_ajaran}}" name="thn_ajaran">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No Hp</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->nohp}}" name="nohp" id="nohp" placeholder="No Hp">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Orang Tua</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->nama_ortu}}" name="nama_ortu" id="nama_ortu" placeholder="Nama Orang Tua">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">NIK</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->nik}}" name="nik" id="nik" placeholder="Nomer Induk Kewarganegaraan">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Gaji Orang Tua</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->gaji_ortu}}" name="gaji_ortu" id="gaji_ortu" placeholder="Gaji">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanggungan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->tanggungan}}" name="tanggungan"  id="tanggungan" placeholder="Tanggungan">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$data->alamat}}" name="alamat" id="alamat">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Struk Gaji</label>
              <div class="col-sm-9">
                <img src="{{ asset('data-slip-gaji/'.$data->slip_gaji)}}" width="100px" alt="">
                <input type="file" name="file" id="file" class="form-control file-upload-info"  placeholder="Upload Image">
                <span class="input-group-append">
              </div>
            </div>
          </div>
        </div>
        @if(auth()->user()->level == 'prodi')
        <a href="{{url('/beasiswa')}}"  class="btn btn-secondary" >Close</a>
        @else
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        @endif
      </form>
    </div>
  </div>
</div>
 @endsection