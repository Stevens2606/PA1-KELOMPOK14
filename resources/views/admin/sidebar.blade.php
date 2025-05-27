<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">

    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('admin.dashboard') }}">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.mejas.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('admin.mejas.index') }}">
           <i class="material-symbols-rounded opacity-5">table_restaurant</i> <!-- Ikon meja -->
            <span class="nav-link-text ms-1">Meja</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.menus.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('admin.menus.index') }}">
           <i class="material-symbols-rounded opacity-5">table_view</i>
            <span class="nav-link-text ms-1">Menu</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.testimoni.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('admin.testimoni.index') }}">
           <i class="material-symbols-rounded opacity-5">format_quote</i>
            <span class="nav-link-text ms-1">Testimoni</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.contact_messages.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('admin.contact_messages.index') }}">
            <i class="material-symbols-rounded opacity-5">view_in_ar</i>
            <span class="nav-link-text ms-1">Contact </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.abouts.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('admin.abouts.index') }}">
            <i class="material-symbols-rounded opacity-5">format_textdirection_r_to_l</i>
            <span class="nav-link-text ms-1">About</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.galeri.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('admin.galeri.index') }}">
            <i class="material-symbols-rounded opacity-5">album</i>
            <span class="nav-link-text ms-1">Galeri</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.reservations.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('admin.reservations.index') }}">
           <i class="material-symbols-rounded opacity-5">event_available</i>
            <span class="nav-link-text ms-1">Reservasi</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.orders.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('admin.orders.index') }}">
           <i class="material-symbols-rounded opacity-5">person_outline</i>
            <span class="nav-link-text ms-1">Order</span>
          </a>
        </li>

        <li class="nav-item">
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
           </form>
           <a class="nav-link text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="material-symbols-rounded opacity-5">logout</i>
              <span class="nav-link-text ms-1">Logout</span>
           </a>
        </li>
    </div>
</aside>