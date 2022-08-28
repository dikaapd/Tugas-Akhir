<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-2" href="{{url('/')}}"><img src="{{asset('layout/images/logo.png')}}"  alt="logo"/>
     </a>
      <a href="{{url('/')}}"> <span class="navbar-brand"><h6>SIM Kemahasiswan</h6></span></a>
      {{-- <a  href="{{url('/')}}">SIM Kemahasiswan</a> --}}
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
        <li class="navbar-nav mr-lg-2">
          <h5> {{ Auth::user()->nama }} </h5>
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <i class="mdi mdi-account-circle" alt="profile"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            {{-- <a class="dropdown-item" href="{{ route('logout')}}">
              <i class="ti-power-off text-primary"></i>
              Logout
            </a> --}}
            <a class="dropdown-item" href="password/{id}/edit">
              <i class="mdi mdi-account-key"></i>
              Reset Password
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
</nav>
 