<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            {{-- <li class="nav-label">Dashboard</li> --}}

            {{-- MENU UTAMA --}}
            {{-- <li>
                <a class="has-arrow" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li> --}}

            {{-- MASTER DATA --}}
            {{-- <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-database menu-icon"></i><span class="nav-text">Master Data</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.user.index') }}">Data USERS</a></li>
                    <li><a href="{{ route('admin.siswa.index') }}">Data SISWA</a></li>
                    <li><a href="{{ route('admin.pkl.index') }}">Data PKL</a></li>
                    <li><a href="{{ route('admin.jadwal.index') }}">Data JADWAL</a></li>
                    <li><a href="{{ route('admin.absensi.index') }}">Data ABSENSI</a></li>
                    <li><a href="{{ route('admin.kegiatan.index') }}">Data KEGIATAN PKL</a></li>
                    <li><a href="{{ route('admin.nilai.index') }}">Data PENILAIAN</a></li>
                    <li><a href="{{ route('admin.laporan.index') }}">Data LAPORAN</a></li>
                </ul>
            </li> --}}
            {{-- END MASTER DATA --}}

            <li>
                <a class="has-arrow" href="{{ route('pindustri.absensi.index') }}" aria-expanded="false">
                    <i class="icon-check menu-icon"></i><span class="nav-text">Absensi</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="{{ route('pindustri.nilai.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Penilaian</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="{{ route('pindustri.laporan.index') }}" aria-expanded="false">
                    <i class="icon-chart menu-icon"></i><span class="nav-text">Laporan</span>
                </a>
            </li>

        </ul>
    </div>
</div>
