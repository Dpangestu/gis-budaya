<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <button href="/" class="brand-link">
        <img src="{{ asset('tamplate/dist/img/AdminLTELogo.png') }}" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light ">{{ config('app.name') }}</span>
    </button>

    <br>

    <div class="sidebar">

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ $titel === 'Dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/seni" class="nav-link {{ $titel === 'Seni' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>Data Seni</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/budaya" class="nav-link {{ $titel === 'Budaya' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-mask"></i>
                        <p>Data Budaya</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/pengajuan" class="nav-link {{ $titel === 'Pengajuan Data' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Pengajuan Data</p>
                        {{-- @if ($pendingCount > 0)
                            <span class="badge badge-warning right">{{ $pendingCount }}</span>
                        @endif --}}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/komentar" class="nav-link {{ $titel === 'Komentar' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Komentar</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/jadwal" class="nav-link {{ $titel === 'Jadwal Event' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Jadwal Event</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/Users" class="nav-link {{ $titel === 'Kelola Users' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Kelola Users</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/pengajuanK"
                        class="nav-link {{ $titel === 'Pengajuan Data Kontributor' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Pengajuan Data (Kontributor)</p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>
