<nav id="navmenu" class="navmenu">
<ul>
    <li><a href="{{ route('home') }}">Home</a></li>
<li><a href="{{ route('about') }}">About</a></li>
<li><a href="{{ route('menu.public') }}">Menu</a></li>
<li><a href="{{ route('testimoni.public') }}">Testimoni</a></li>
<li><a href="{{ route('gallery') }}">Gallery</a></li>
<li><a href="{{ route('contact.index') }}">Contact</a></li>
<li><a href="{{ route('reservations.index') }}">Reservasi</a></li>
<li><a href="{{ route('orders.index') }}">Order</a></li>

        @auth
            @if (Auth::user()->isAdmin())
                <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard Admin</a></li>
            @endif
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
        @endauth
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>

<!-- @guest
    <a class="btn btn-danger" href="{{ route('login') }}" role="button">Login</a>
@endguest -->