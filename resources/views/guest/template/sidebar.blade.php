@if (session()->has('user'))
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - User -->
    <div class="sidebar-heading" style="font-size: 1.2rem; font-weight: bold;">
        Halo, {{ session('user.nama') }}
    </div>

    <!-- Kategori Barang -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-box"></i>
            <span>Barang</span>
        </a>
    </li>

    <!-- Mutasi -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/mutasi') }}">
            <i class="fas fa-random"></i>
            <span>Mutasi</span>
        </a>
    </li>

    <!-- Logout -->
    <li class="nav-item">
        <form action="{{ url('/logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-left">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </li>

</ul>
@endif
