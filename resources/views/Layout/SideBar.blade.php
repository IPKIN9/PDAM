<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item 
        {{ Route::is('golongan.index') ? 'active' : '' }}
        {{ Route::is('karyawan.index') ? 'active' : '' }}
        ">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Semua Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse 
            {{ Route::is('golongan.index') ? 'show' : '' }} 
            {{ Route::is('karyawan.index') ? 'show' : '' }} 
            " id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ Route::is('golongan.index') ? 'active' : '' }}"> <a class="nav-link"
                            href="{{route('golongan.index')}}">Golongan</a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ Route::is('karyawan.index') ? 'active' : '' }}"> <a class="nav-link"
                            href="{{route('karyawan.index')}}">Karyawan</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Route::is('daftar.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('daftar.index')}}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Pemasangan Baru</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('contoh.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('contoh.index')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Contoh</span>
            </a>
        </li>
    </ul>
</nav>