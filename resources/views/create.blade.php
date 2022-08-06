@extends('template.app')

 {{-- <!-- Plugin css for this page -->
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
 <!-- inject:css --> --}}

 @section('content')
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">From Pengajuan Beasiswa</h4>
              <div class="form-group">
            <form class="forms-sample">
                <label for="exampleInputName1">NIM</label>
                <input type="text" class="form-control" name="nim" placeholder="Nim">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Nama</label>
                <input type="email" class="form-control" name="name_mhs" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Prodi</label>
                  <select class="form-control" name="jurusan">
                    <option>IF</option>
                    <option>AK</option>
                  </select>
                </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Gaji Orang Tua</label>
                <input type="password" class="form-control" name="gaji_ortu" placeholder="Gaji">
              </div>
              
              <div class="form-group">
                <label>File upload</label>
                <input type="file" name="slip_gaji" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload Struk Gaji</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputCity1">Tannggungan</label>
                <input type="text" class="form-control" name="tanggungan" placeholder="Tanggungan">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
      
  <!-- content-wrapper ends -->

  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>  
@endsection
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
 