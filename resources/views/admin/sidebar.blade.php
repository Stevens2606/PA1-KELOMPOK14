<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Menu Management</div>
                <a class="nav-link" href="{{ route('admin.menus.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Daftar Menu
                </a>

                <!-- Testimoni Link -->
                <a class="nav-link" href="{{ route('admin.testimoni.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                    Testimoni
                </a>

                <!-- About Us Link -->
                <a class="nav-link" href="{{ route('admin.abouts.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                    About Us
                </a>

                <!-- Gallery Link -->
                <a class="nav-link" href="{{ route('admin.galeri.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                    Gallery
                </a>

                <!-- Contact Link -->
                <a class="nav-link" href="{{ route('admin.contacts.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                    Contact
                </a>

                <!-- Reservations Link -->
                <a class="nav-link" href="{{ route('admin.reservations.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                    Reservations
                </a>

                <!-- Orders Link -->
                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Orders
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            @auth
            {{ Auth::user()->name }}
            @else
            Pengguna tidak login
            @endauth
        </div>
    </nav>
</div>