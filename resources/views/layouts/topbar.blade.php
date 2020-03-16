<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                @if(!empty(Auth::user()->avatar))
                <img src="{{ Auth::user()->avatar }}" alt="user-image" class="rounded-circle">
                @endif
                <span class="pro-user-name ml-1">
                    {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Bienvenido</h6>
                </div>

                <a href="/profile" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Mi Cuenta</span>
                </a>

                <a href="/password" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Contraseña</span>
                </a>

                <div class="dropdown-divider"></div>

                <a href="/logout" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Cerrar Sesión</span>
                </a>
            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="/" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ env('LOGO_URL', '/images/logo.png') }}" alt="" height="42">
            </span>
            <span class="logo-sm">
                <img src="{{ env('LOGO_URL', '/images/logo.png') }}" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>
<!-- end Topbar -->
