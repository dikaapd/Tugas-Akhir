@extends('template.app')

@section('content')
<form action="{{URL('beasiswa/store')}}" method="POST">
@csrf
  <div class="form-group">
    <label>Nim</label>
    <input type="text" class="form-control" name="nim">
  </div>
  @error('nim')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="nama_mhs">
  </div>
  @error('nama_mhs')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <div class="form-group">
    <label>Jurusan</label>
    <textarea class="form-control" name="jurusan"></textarea>
  </div>
  @error('jurusan')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label>Gaji</label>
    <textarea class="form-control" name="gaji_ortu"></textarea>
  </div>
  @error('gaji_ortu')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label >Tanggungan</label>
    <textarea class="form-control" name="tanggungan"></textarea>
  </div>
  @error('tanggungan')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label>Slip</label>
    <textarea class="form-control" name="slip_gaji"></textarea>
  </div>
  @error('slip_gaji')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
<script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->

@endsection
