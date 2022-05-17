<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Welcome Admin</div>
        </a>

        <!-- Nav Item - Dashboard -->
        <div class="sidebar-heading">
           Transaksi
        </div>
            {{-- <li class="nav-item {{ $title==='transaction' ? ' active' :'' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Transaksi</span></a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Transaksi</h6>
                        <a class="collapse-item" href="/expense">Pengeluaran</a>
                        <a class="collapse-item" href="#">Pemasukan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ $title==='history' ? ' active' :'' }}">
                <a class="nav-link" href="{{ route('history') }}">
                    <i class="fas fa-history"></i>
                    <span>History</span></a>
            </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>
            <li class="nav-item {{ $title==='person' ?' active' :'' }}">
                <a class="nav-link" href="{{ route('person') }}">
                    <i class="fas fa-user"></i>
                    <span>Data Penghuni</span></a>
            </li> 
            <li class="nav-item {{ $title==='cluster' ?' active' :'' }}">
                <a class="nav-link" href="{{ route('cluster') }}">
                    <i class="fas fa-house-user"></i>
                    <span>Data Cluster</span></a>
            </li>
            <li class="nav-item {{ $title==='book' ?' active' :'' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-user-edit"></i>
                    <span>Data User</span></a>
            </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>