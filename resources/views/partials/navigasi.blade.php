<nav class="navbar navbar-expand-md border-bottom" style="background-color: yellow;">
    <div class="container d-flex justify-content-between">
        
            <ul class="navbar-nav col-md-1 ">
                <div class="block">
                    <div style="font-size: 20px; font-weight: bold; font-style: italic; color: black">Bebek</div>
                    <div style="font-size: 20px; font-weight: bold; font-style: italic; margin-left: 3rem; margin-top: -0.5rem; color: black">Restorasi</div>
                </div>
            </ul>
    
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link " href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link  dropdown" href="{{ route('home') }}#kategori">Kategori</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link " href="{{ route('home') }}#about">Tentang Kami</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link " href="{{ route('home') }}#galeri">Galeri</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link " href="{{ route('home') }}#contact">Kontak</a>
                </li>
                
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('login') }}">Masuk</a>
                    </li>
                @endif
    
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                    </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a href="#" role="button" class="nav-link dropdown-toggle d-flex align-items-center " data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a href="{{ route('profil') }}" class="dropdown-item">Profil</a>
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