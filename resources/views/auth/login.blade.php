<!DOCTYPE html>
<html lang="en">
 
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kemahasiswaan Politeknik TEDC Bandung</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('layout/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('layout/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('layout/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('layout/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('layout/images/logo.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                {{-- <img src="{{asset('layout/images/1.png')}}" alt="logo" width="100%"> --}}
              </div>
              <form action="{{ route('postlogin')}}" method="post">
                {{ csrf_field() }}
<<<<<<< HEAD
                <img src="{{asset('layout/images/SIM.png')}}" alt="logo"  width="100%">
              <h4><p align="center">Selamat Datang </p></h4>
              <h6 class="font-weight-light"><p align="center">Login Untuk Melanjutkan</p></h6>
=======
                <img src="{{asset('layout/images/2.png')}}" alt="logo" width="100%">
                <br>  
                <br>
              <h4 align="center"><p> Selamat Datang </p> </h4>
              <h6  align="center" class="font-weight-light">Login Untuk Melanjutkan</h6>
>>>>>>> 26004eb272596d90657ba8b2584d940115f9b65a
              <form class="pt-3">
                <div class="form-group">
                  <input type="username" class="form-control form-control-lg" name="username" placeholder="Username">
                </div>
                @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum Mempunyai Akun ? <a href="{{url('/registrasi')}}" class="text-primary">Daftar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('layout//vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('layout/js/off-canvas.js')}}"></script>
  <script src="{{asset('layout/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('layout/js/template.js')}}"></script>
  <script src="{{asset('layout/js/settings.js')}}"></script>
  <script src="{{asset('layout//js/todolist.js')}}"></script>
  @include('sweetalert::alert')
  <!-- endinject -->
</body>

</html>
