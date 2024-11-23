<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Manajemen Ban</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#ban-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-circle"></i><span>Data Ban</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ban-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('ban.index') }}" class="{{ request()->routeIs('ban.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Master Ban</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pemakaian_ban.index') }}" class="{{ request()->routeIs('pemakaian_ban.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Pemakaian Ban</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('lepas_ban.index') }}" class="{{ request()->routeIs('lepas_ban.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Lepas Ban</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('otfban.index') }}" class="{{ request()->routeIs('otfban.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>OTF Ban</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-heading">Master Data</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#master-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="master-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('cabang.index') }}" class="{{ request()->routeIs('cabang.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Cabang</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kendaraan.index') }}" class="{{ request()->routeIs('kendaraan.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Kendaraan</span>
                    </a>
                </li>
                {{-- @can('ruang.index')
                <li>
                    <a href="{{ route('ruang.index') }}" class="{{ request()->routeIs('ruang.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Master Data Ruangan</span>
                    </a>
                </li>
                @endcan --}}
            </ul>
        </li>

        <li class="nav-heading">Manajemen User</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Data User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                {{-- @can('ruang.index')
                <li>
                    <a href="{{ route('user.index') }}" class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>User Ruangan</span>
                    </a>
                </li>
                @endcan --}}

                @if (!Auth::user()->hasRole('user'))
                    @can('users.index')
                    <li>
                        <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.index') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Master User</span>
                        </a>
                    </li>
                    @endcan
                @endif
            </ul>
        </li>

        {{-- <li class="nav-heading">Pengaturan</li> --}}

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#hakakses-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-shield-lock"></i><span>Hak Akses</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="hakakses-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @can('permissions.index')
                <li>
                    <a href="{{ route('roles.index') }}" class="{{ request()->routeIs('roles.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Role</span>
                    </a>
                </li>
                @endcan
                @can('permissions.index')
                <li>
                    <a href="{{ route('permissions.index') }}" class="{{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Permission</span>
                    </a>
                </li>
                @endcan
            </ul>
        </li> --}}

    </ul>

</aside><!-- End Sidebar-->

<script>
    let linkActive = document.querySelector('li a.active')
    linkActive?.parentElement?.parentElement?.classList.add('show')
</script>
