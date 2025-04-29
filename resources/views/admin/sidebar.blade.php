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
                <a class="nav-link" href="{{ route('admin.testimoni.index') }}">  <!--  Ganti 'testimonis' dengan rute yang benar jika berbeda -->
                    <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>  <!-- Gunakan ikon yang sesuai, ini hanya contoh -->
                    Testimoni
                </a>
                 <!-- About Us Link -->
                <a class="nav-link" href="{{ route('admin.abouts.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                    About Us
                </a>
                <a class="nav-link" href="{{ route('admin.galeri.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Gallery
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