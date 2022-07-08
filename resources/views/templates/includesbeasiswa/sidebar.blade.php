<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only"></span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">SIM Kemahasiswaan</span>
                </div>
            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>  
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="{{url('/beasiswa')}}"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a class="active" href="{{url('/beasiswa/create')}}">
                        <span class="icon document" aria-hidden="true"></span>Ajukan Beasiswa</a>
                </li>
            </ul>
        </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture><source srcset="{{ asset('assets/img/avatar/avatar-illustrated-01.webp')}}" type="image/webp"><img src="{{ asset('assets/img/avatar/avatar-illustrated-01.png')}}" alt="User name"></picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__subtitle">Admin</span>
            </div>
        </a>
    </div>
</div>
</aside>