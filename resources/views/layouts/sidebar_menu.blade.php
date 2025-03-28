
@if (auth()->user()->role === 'Administrator')
    <li class="nav-item {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Master</h4>
    </li>

    <li class="nav-item {{ preg_match('/^kategori\.(index|create|show|edit)$/', Route::currentRouteName()) ? 'submenu active' : ''}}">
        <a data-toggle="collapse" href="#kategori">
            <i class="fas fa-clone"></i>
            <p>Kategori</p>
            <span class="caret"></span>
        </a>

        <div class="collapse {{ preg_match('/^kategori\.(index|create|show|edit)$/', Route::currentRouteName()) ? 'show' : ''}}" id="kategori">
            <ul class="nav nav-collapse">
                <li class="active">
                    <a href="{{ route('kategori.index') }}">
                        <span class="sub-item">Data Kategori</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item {{ preg_match('/^barang\.(index|create|show|edit)$/', Route::currentRouteName()) ? 'submenu active' : ''}}">
        <a data-toggle="collapse" href="#barang">
            <i class="fas fa-clone"></i>
            <p>Barang</p>
            <span class="caret"></span>
        </a>

        <div class="collapse {{ preg_match('/^barang\.(index|create|show|edit)$/', Route::currentRouteName()) ? 'show' : ''}}" id="barang">
            <ul class="nav nav-collapse">
                <li class="active">
                    <a href="{{ route('barang.index') }}">
                        <span class="sub-item">Data Barang</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Master</h4>
    </li>

    <li class="nav-item {{ preg_match('/^produksi\.(index|create|show|edit)$/', Route::currentRouteName()) ? 'submenu active' : ''}}">
        <a data-toggle="collapse" href="#jadwal-produksi">
            <i class="fas fa-clone"></i>
            <p>Jadwal Produksi</p>
            <span class="caret"></span>
        </a>

        <div class="collapse {{ preg_match('/^produksi\.(index|create|show|edit)$/', Route::currentRouteName()) ? 'show' : ''}}" id="jadwal-produksi">
            <ul class="nav nav-collapse">
                <li class="active">
                    <a href="{{ route('produksi.index') }}">
                        <span class="sub-item">Data Jadwal Produksi</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Transaksi</h4>
    </li>

    <li class="nav-item {{ preg_match('/^barang\-masuk\.(index|create|show|edit)$/', Route::currentRouteName()) ? 'active' : ''}}">
        <a href="{{ route('barang-masuk.index') }}">
            <i class="fas fa-sign-in-alt"></i>
            <p>Barang Masuk</p>
        </a>
    </li>
    <li class="nav-item {{ preg_match('/^barang\-keluar\.(index|create|show|edit)$/', Route::currentRouteName()) ? 'active' : ''}}">
        <a href="{{ route('barang-keluar.index') }}">
            <i class="fas fa-sign-out-alt"></i>
            <p>Barang Keluar</p>
        </a>
    </li>
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Laporan</h4>
    </li>

    <li class="nav-item {{ preg_match('/^laporan\-stok\.index$/', Route::currentRouteName()) ? 'active' : ''}}">
        <a href="{{ route('laporan-stok.index') }}">
            <i class="fas fa-file-signature"></i>
            <p>Laporan Stok</p>
        </a>
    </li>
    <li class="nav-item {{ preg_match('/^laporan\-barang\-masuk\.index$/', Route::currentRouteName()) ? 'active' : ''}}">
        <a href="{{ route('laporan-barang-masuk.index') }}">
            <i class="fas fa-file-import"></i>
            <p>Laporan Barang Masuk</p>
        </a>
    </li>
    <li class="nav-item {{ preg_match('/^laporan\-barang\-keluar\.index$/', Route::currentRouteName()) ? 'active' : ''}}">
        <a href="{{ route('laporan-barang-keluar.index') }}">
            <i class="fas fa-file-export"></i>
            <p>Laporan Barang Keluar</p>
        </a>
    </li>
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Pengaturan</h4>
    </li>

    <li class="nav-item {{ preg_match('/^user\.(index|create|edit)$/', Route::currentRouteName()) ? 'active' : ''}}">
        <a href="{{ route('user.index') }}">
            <i class="fas fa-user"></i>
            <p>Manajemen User</p>
        </a>
    </li>
@else
    <li class="nav-item {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>

    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Master</h4>
    </li>

    <li class="nav-item {{ preg_match('/^produksi\.(index|create|show|edit)$/', Route::currentRouteName()) ? 'submenu active' : ''}}">
        <a data-toggle="collapse" href="#jadwal-produksi">
            <i class="fas fa-clone"></i>
            <p>Jadwal Produksi</p>
            <span class="caret"></span>
        </a>

        <div class="collapse {{ preg_match('/^produksi\.(index|create|show|edit)$/', Route::currentRouteName()) ? 'show' : ''}}" id="jadwal-produksi">
            <ul class="nav nav-collapse">
                <li class="active">
                    <a href="{{ route('produksi.index') }}">
                        <span class="sub-item">Data Jadwal Produksi</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Laporan</h4>
    </li>

    <li class="nav-item {{ preg_match('/^laporan\-stok\.index$/', Route::currentRouteName()) ? 'active' : ''}}">
        <a href="{{ route('laporan-stok.index') }}">
            <i class="fas fa-file-signature"></i>
            <p>Laporan Stok</p>
        </a>
    </li>
    <li class="nav-item {{ preg_match('/^laporan\-barang\-masuk\.index$/', Route::currentRouteName()) ? 'active' : ''}}">
        <a href="{{ route('laporan-barang-masuk.index') }}">
            <i class="fas fa-file-import"></i>
            <p>Laporan Barang Masuk</p>
        </a>
    </li>
    <li class="nav-item {{ preg_match('/^laporan\-barang\-keluar\.index$/', Route::currentRouteName()) ? 'active' : ''}}">
        <a href="{{ route('laporan-barang-keluar.index') }}">
            <i class="fas fa-file-export"></i>
            <p>Laporan Barang Keluar</p>
        </a>
    </li>
@endif

