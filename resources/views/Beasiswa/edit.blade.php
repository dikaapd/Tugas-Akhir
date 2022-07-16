@extends('template.app')

@section('content')
<form action="{{ route('update_data', $data->id) }}" method="POST">
@csrf
@method('put')
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



@endsection
