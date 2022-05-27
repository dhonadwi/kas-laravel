  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ url('/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ASI ext</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

       <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('person-history',Auth::user()->id) }}" class="nav-link">
                  <i class="fas fa-money-check-alt"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
              @if (Auth::user()->roles == 'ADMIN')
              <li class="nav-item">
                <a href="{{ route('transaction-expense') }}" class="nav-link">
                  <i class="fas fa-money-check-alt"></i>
                  <p>Pengeluaran</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="{{ route('history') }}" class="nav-link">
                 <i class="fas fa-file-invoice-dollar"></i>
                  <p>History</p>
                </a>
              </li>
            </ul>
          </li>
          @if(Auth::user()->roles == 'ADMIN') {
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('person') }}" class="nav-link">
                  <i class="fas fa-house-user"></i>
                  <p>Data Penghuni</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('cluster') }}" class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>Data Cluster</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user') }}" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>Data User</p>
                </a>
              </li>

            </ul>
          </li>
           }
           @endif
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user-setting') }}" class="nav-link">
                  <i class="fas fa-user-cog"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>