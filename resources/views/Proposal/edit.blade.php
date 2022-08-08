@extends('template.app')

@section('content')
<form action="{{ route('ubah_data', $data->id) }}" method="POST">
@csrf
@method('put')
  <div class="form-group">
    <label>Ormawa_Id</label>
    <input type="text" class="form-control" name="ormawa_id">
  </div>
  @error('ormawa_id')
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
    <input type="dateTime" class="form-control" name="tanggal_kegiatan"></textarea>
  </div>
  @error('tanggal_kegiatan')
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
    <label>Lampiran</label>
    <input type="string" class="form-control" name="lampiran"></textarea>
  </div>
  @error('lampiran')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>



@endsection
