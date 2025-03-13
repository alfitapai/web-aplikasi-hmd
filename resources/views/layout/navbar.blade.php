<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    {{-- <button class="btn btn-outline-primary" type="button" onclick="toggleSidebar()">
        ☰
    </button> --}}
    {{-- <a href="#" class="navbar-brand ml-3">App</a> --}}
    <img src="{{ asset('assets/img/logo-example.png') }}" alt="brand" class="navbar-brand" width="50px">
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            {{-- <li class="nav-item active"> --}}
            <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item {{ Request::routeIs('lamanpenjualan') ? 'active' : '' }}">
                <a href="{{ route('lamanpenjualan') }}" class="nav-link">Penjualan</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Stok</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Absensi</a>
            </li>
        </ul>
    </div>
</nav>
