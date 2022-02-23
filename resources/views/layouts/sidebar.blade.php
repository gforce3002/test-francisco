<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menú</li>

                <li>
                    <a href="/coverages">
                        <i class="fa fa-money-bill"></i>
                        <span> Coberturas</span>
                    </a>
                </li>

                <li>
                    <a href="/users">
                        <i class="fa fa-users"></i>
                        <span> Usuarios</span>
                    </a>
                </li>

                <li>
                    <a href="/api">
                        <i class="fa fa-key"></i>
                        <span> API Keys</span>
                    </a>
                </li>

                @foreach($menu as $item)
                    <li>
                        <a href="{{ $item['url'] }}">
                            <i class="fa {{ $item['icon'] }}"></i>
                            <span> {{ $item['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
