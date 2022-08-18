<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" ><img src="{{asset('layout/images/logo.svg')}}" class="mr-2" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" ><img src="{{asset('layout/images/logo-mini.svg')}}" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
      <ul class="navbar-nav mr-lg-2">
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="navbar-nav mr-lg-2">
          <h5> {{ Auth::user()->nama }} </h5>
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="{{asset('layout/images/user.png')}}" alt="profile"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{ route('logout')}}">
              <i class="ti-power-off text-primary"></i>
              Logout
            </a>
            <a class="dropdown-item" href="password/{id}/edit">
              <i class="mdi mdi-account-key"></i>
              Reset Password
            </a>
          </div>
        </li>
        {{-- <li class="nav-item nav-settings d-none d-lg-flex">
          <a class="nav-link" href="#">
            <i class="icon-ellipsis"></i>
          </a>
        </li> --}}
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>