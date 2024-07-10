<style>
    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .header .header-content {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .header-title-right {
        flex-grow: 1;
        text-align: center;
        margin: 30px 0;
    }

    .header-title-right h4 {
        font-size: 18px;
        color: white;
    }

    .header-right {
        display: flex;
        align-items: center;
    }

    /* Media query for mobile devices */
    @media (max-width: 768px) {
        .header-title-right h4 {
            display: none;
        }
    }
</style>

<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu" style="color: white"></i></span>
            </div>
        </div>
        <div class="header-left">
        </div>

        <div class="header-title-right">
            <h4>SISTEM INFORMASI PRAKTIK KERJA LAPANGAN SMK WIJAYA PUTRA</h4>
        </div>
        <div class="header-right">

            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <i class="fa fa-user" style="color: white"></i>
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    {{-- {{ Auth::user()->role }} --}}
                                    @if (Auth::user()->role == 'ADMIN')
                                        <a href="{{ route('admin.profile') }}"><i class="icon-user"></i>
                                            <span>Profile</span></a>
                                    @elseif(Auth::user()->role == 'PEMBIMBING SEKOLAH')
                                        <a href="{{ route('psekolah.profile') }}"><i class="icon-user"></i>
                                            <span>Profile</span></a>
                                    @elseif(Auth::user()->role == 'PEMBIMBING INDUSTRI')
                                        <a href="{{ route('pindustri.profile') }}"><i class="icon-user"></i>
                                            <span>Profile</span></a>
                                    @else
                                        <a href="{{ route('siswa.profile') }}"><i class="icon-user"></i>
                                            <span>Profile</span></a>
                                    @endif
                                </li>
                                <li>
                                    <hr class="my-2">
                                    <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>
                                        <span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
