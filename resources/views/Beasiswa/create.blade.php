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
 
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form action="{{URL('beasiswa/store')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <h4 class="card-title">From Pengajuan Beasiswa</h4>
              <div class="form-group">
            <form class="forms-sample">
                <label for="exampleInputName1">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" placeholder="Nim">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Nama</label>
                <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Pilih Prodi</label>
                  <select class="form-control" name="jurusan_id" id="jurusan_id">
                    <option disable value> Prodi </option>
                    @foreach ($jurusan as $item)
                    <option value="{{$item->id}}">{{$item->jurusan}}</option>
                    @endforeach
                  </select>
                </div>
              <div class="form-group">
                <label for="exampleInputGaji">Gaji Orang Tua</label>
                <input type="text" class="form-control" name="gaji_ortu" id="gaji_ortu" placeholder="Gaji">
              </div>
              
              <div class="form-group">
                <label>File upload</label>
                <div class="input-group col-xs-12">
                  <input type="file" name="file" id="file" class="form-control file-upload-info"  placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload Struk Gaji</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Tannggungan</label>
                <input type="text" class="form-control" name="tanggungan"  id="tanggungan" placeholder="Tanggungan">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
      @endsection

  <!-- content-wrapper ends -->

  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>  
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
 

