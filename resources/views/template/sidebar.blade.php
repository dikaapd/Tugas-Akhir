<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @if (auth()->user()->level=="admin")
      <li class="nav-item">
        <a class="nav-link" href="##">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">List Yang Diajukan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/beasiswa')}}">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">List Pendaftar</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{url('/beasiswa/create')}}">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">Pengajuan Beasiswa</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Pengumuman</span>
        </a>
      </li>
      
    </ul>
  </nav>