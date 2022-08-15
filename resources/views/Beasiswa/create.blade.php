@extends('template.app')



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
      <form action="{{URL('beasiswa/store')}}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" name="nim" id="nim" placeholder="Nim">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" placeholder="Nama Lengkap">
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
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tempat Tanggal Lahir</label>
              <div class="col-sm-9">
                <input class="form-control" name="ttl" id="ttl" placeholder="dd/mm/yyyy"/>
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
                    <option value="{{$item->id}}">{{$item->jurusan}}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <p class="card-description">
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="alamat" id="alamat">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No Hp</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nohp" id="nohp" placeholder="No Hp">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Orang Tua</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_ortu" id="nama_ortu" placeholder="Nama Orang Tua">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">NIK</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nik" id="nik" placeholder="Nomer Induk Kewarganegaraan">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Gaji Orang Tua</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="gaji_ortu" id="gaji_ortu" placeholder="Gaji">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanggungan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control"  name="tanggungan"  id="tanggungan" placeholder="Tanggungan">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Struk Gaji</label>
              <div class="col-sm-9">
                <input type="file" name="file" id="file" class="form-control file-upload-info"  placeholder="Upload Image">
                <span class="input-group-append">
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection

  <!-- content-wrapper ends -->

  <!-- partial -->

<!-- main-panel ends -->

<!-- page-body-wrapper ends -->
 
   <!-- Plugin js for this page -->
   <script src="{{asset('layout/vendors/js/vendor.bundle.base.js')}}"></script>
   <script src="{{asset('layout/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
   <script src="{{asset('layout/vendors/select2/select2.min.js')}}"></script>
   <!-- End plugin js for this page -->
    <!-- inject:js -->
  <script src="{{asset('layout/js/off-canvas.js')}}"></script>
  <script src="{{asset('layout/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('layout/js/template.js')}}"></script>
  <script src="{{asset('layout/js/settings.js')}}"></script>
  <script src="{{asset('layout/js/todolist.js')}}"></script>
   <!-- Custom js for this page-->
   <script src="{{asset('layout/js/file-upload.js')}}"></script>
   <script src="{{asset('layout/js/typeahead.js')}}"></script>
   <script src="{{asset('layout/js/select2.js')}}"></script>
 

