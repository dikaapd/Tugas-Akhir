@extends('template.app')

@section('content')
<form action="{{URL('proposal/store')}}" method="POST">
@csrf
<div class="form-group">
    <label>Id Ormawa</label>
    <input type="text" class="form-control" name="id_ormawa">
  </div>
  @error('id_ormawa')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
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
    <input type="date" class="form-control" name="tgl_kegiatan"></textarea>
  </div>
  @error('tgl_kegiatan')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label >Total Dana</label>
    <input type="text" class="form-control" name="total_dana"></textarea>
  </div>
  @error('total_dana')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label>File</label>
    <input type="string" class="form-control" name="file"></textarea>
  </div>
  @error('file')
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
