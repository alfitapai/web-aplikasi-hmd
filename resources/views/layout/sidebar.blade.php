{{--
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <span class="fs-4">Nama Aplikasi / Nama Instansi</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ route('home') }}" class=" {{ Request::routeIs('home')? 'nav-link active' :'nav-link link-dark' }} ">
            <i class="fa-solid fa-gauge me-2"></i>
          Dashboard
        </a>
      </li>

    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('assets/img/user.png') }}" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>{{ Auth::user()->userid }}</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">Profile (Coming Soon)</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('proslogout') }}">Sign out</a></li>
      </ul>
    </div>
  </div> --}}

<style>
    .nav {
        margin-top: 50px;
    }
</style>
<div class="sidebare" id="sidebare">
    {{-- <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Nama Aplikasi / Nama Instansi</span>
      </a>
      <hr> --}}
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('home') }}"
                class="{{ Request::routeIs('home') ? 'nav-link active' : 'nav-link link-dark' }}">
                <i class="fa-solid fa-gauge me-2"></i>Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('lamanpenjualan') }}"
                class="{{ Request::routeIs('lamanpenjualan') ? 'nav-link active' : 'nav-link link-dark' }}"> <i
                    class="fa-solid fa-circle-dollar-to-slot me-2"></i>Penjualan</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('stok') }}" class="{{ Request::routeIs('stok') ? 'nav-link active' : 'nav-link link-dark'}}"> <i class="fa-solid fa-warehouse me-2"></i>Stok</a>
        </li>
        <hr>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark"> <i class="fa-solid fa-users-rectangle me-2"></i>Absensi</a>
        </li>
    </ul>
    <hr>
    <div class="punyauser">
        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('setting') }}" class=" nav-link link-dark mb-1"><strong><u>Setting</u></strong></a>
            </li>
            <li class="nav-item">
                <a href="#" class=" nav-link link-dark mb-1"><strong><u>Profil (Coming Soon)</u></strong></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('proslogout') }}" class=" nav-link link-dark mb-1"><strong><u>Logout</u></strong></a>
            </li>
        </ul>
        <hr>
        <div class="isiuser">
            <img src="{{ asset('assets/img/user.png') }}" width="32" height="32" class="rounded-circle me-2">
            <strong>{{ Auth::user()->userid }}</strong>
        </div>
        {{-- <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets/img/user.png') }}" width="32" height="32" class="rounded-circle me-2" >
                <strong>{{ Auth::user()->userid }}</strong>
            </a>
            <ul class="dropdown-menu text-small shadow menu-user" aria-labelledby="dropdownUser" >
                <li><a href="#" class="dropdown-item">Profil (Coming Soon)</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a href="{{ route('proslogout') }}" class="dropdown-item">Keluar</a></li>
            </ul>
        </div> --}}

    </div>
</div>
