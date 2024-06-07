<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('layouts.nav')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('layouts.header')
        <!--**********************************
            Header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        {{-- @dump(Auth::user()->role) --}}

        @if (Auth::user()->role == 'ADMIN')
            @include('layouts.sidebar.sidebar-admin')
        @elseif (Auth::user()->role == 'PEMBIMBING SEKOLAH')
            @include('layouts.sidebar.sidebar-pembimbing-sekolah')
        @elseif (Auth::user()->role == 'PEMBIMBING INDUSTRI')
            @include('layouts.sidebar.sidebar-pembimbing-industri')
        @else
            @include('layouts.sidebar.side')
        @endif
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                {{-- <div class="row"> --}}

                @yield('content')
                {{-- </div> --}}
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        @include('layouts.foot')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    @include('layouts.script')

</body>

</html>
