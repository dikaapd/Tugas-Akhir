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
@include('sweetalert::alert')
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                {{-- <img src="{{asset('layout/images/logo.svg')}}" alt="logo"> --}}
              </div>
              <img src="{{asset('layout/images/SIM.png')}}" alt="logo"  width="100%">
              <h6 class="font-weight-light"><p align="center">Daftar untuk bisa login di Kemahasiswaan</p></h6>
              <form action="{{ route('postregistrasi')}}" method="POST">
                {{ csrf_field() }}
              <form class="pt-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name = "nama" placeholder="Full Name">
                </div>
                <div class="form-group">
                  <input type="username" class="form-control form-control-lg" name="username"  placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Daftar</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah Mempunyai Akun? <a href="{{url('/login')}}" class="text-primary">Login</a>
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
  <!-- endinject -->
</body>

</html>
