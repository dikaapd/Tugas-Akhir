@extends('template.app')
@section('content')
<h3> Halaman Reset Password</h3>

<div class="col-12 ">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
      <h4 class="card-title">Ganti Password</h4>
      <form class="form-sample">
        <p class="card-description">
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row"> 
              <label class="col-sm-3 col-form-label">Current Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control  form-control-lg"  name="current_password" placeholder="Password">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row"> 
              <label class="col-sm-3 col-form-label">New Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control  form-control-lg"  name="password" placeholder="Password">
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