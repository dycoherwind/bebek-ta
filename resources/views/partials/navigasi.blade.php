<nav class="navbar navbar-expand-md navbar-light border-bottom" style="background-color: #4a4d58">
    <div class="container text-center">
        
            <ul class="navbar-nav col-md-1 text-white">
                <div class="block">
                    <div style="font-size: 20px; font-weight: bold; font-style: italic;">Bebek</div>
                    <div style="font-size: 20px; font-weight: bold; font-style: italic; margin-left: 3rem; margin-top: -0.5rem;">Restorasi</div>
                </div>
            </ul>
    
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-5">
                    <a class="nav-link text-white" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown mx-5">
                    <a class="nav-link text-white dropdown" href="#kategori">Kategori</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link text-white" href="#about">Tentang Kami</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link text-white" href="#galeri">Galeri</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link text-white" href="#contact">Kontak</a>
                </li>
                
                <!-- Authentication Links -->
            </ul>
            <ul class="navbar-nav col-md-1">
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">Masuk</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">Daftar</a>
                    </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a href="#" role="button" class="nav-link dropdown-toggle d-flex align-items-center text-white" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a href="{{ route('user.profil') }}" class="dropdown-item">Profil</a>
                        <a href="{{ route('user.riwayat') }}" class="dropdown-item">Riwayat Pemesanan</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Keluar
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>