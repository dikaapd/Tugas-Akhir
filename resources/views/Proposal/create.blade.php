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
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form action="{{URL('proposal/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="card-title">Pengajuan Proposal</h4>    
            <div class="form-group">
              <label for="exampleSelectGender">Ormawa</label>
              <select class="form-control" name="ormawa_id" id="ormawa_id">
                <option disable value> Ormawa </option>
                @foreach ($ormawa as $item)
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Nama Kegiatan</label>
              <input type="text" class="form-control" name="nama_kegiatan">
            </div>
            @error('nama_kegiatan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label>Jenis Kegiatan</label>
              <input type="text" class="form-control" name="jenis_kegiatan">
            </div>
            @error('jenis_kegiatan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label>Tema Kegiatan</label>
              <input type="text" class="form-control" name="tema_kegiatan"></textarea>
            </div>
            @error('tema_kegiatan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label>Tanggal Kegiatan</label>
              <input type="datetime-local" class="form-control" name="tanggal_kegiatan"></textarea>
            </div>
            @error('tanggal_kegiatan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label >Total Dana</label>
              <input type="double" class="form-control" name="total_dana"></textarea>
            </div>
            @error('total_dana')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label>Lampiran</label>
              <div class="input-group col-xs-12">
                <input type="file" name="file" id="file" class="form-control file-upload-info"  placeholder="Upload Berkas">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload Proposal</button>
                  </span>
              </div>
            </div>
            @error('lampiran')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
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
