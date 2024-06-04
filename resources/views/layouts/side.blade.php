<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            {{-- <li class="nav-label">Dashboard</li> --}}
            {{-- MASTER DATA --}}
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Master Data</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.user.index') }}">Data USERS</a></li>
                    <li><a href="{{ route('admin.siswa.index') }}">Data SISWA</a></li>
                    <li><a href="{{ route('admin.pkl.index') }}">Data PKL</a></li>
                    <li><a href="{{ route('admin.jadwal.index') }}">Data JADWAL</a></li>
                    <li><a href="{{ route('admin.absensi.index') }}">Data ABSENSI</a></li>
                    <li><a href="{{ route('admin.kegiatan.index') }}">Data KEGIATAN PKL</a></li>
                    <li><a href="#">Data PENILAIAN</a></li>
                    <li><a href="#">Data LAPORAN</a></li>
                </ul>
            </li>
            {{-- END MASTER DATA --}}

            {{-- MENU UTAMA --}}
            <li>
                <a class="has-arrow" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-list menu-icon"></i><span class="nav-text">Mendaftar PKL</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-map menu-icon"></i><span class="nav-text">Jadwal & Lokasi PKL</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-check menu-icon"></i><span class="nav-text">Absensi</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-book-open menu-icon"></i><span class="nav-text">Kegiatan PKL</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Penilaian</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-chart menu-icon"></i><span class="nav-text">Laporan</span>
                </a>
            </li>

        </ul>
    </div>
</div>
