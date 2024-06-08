@extends('layouts.layout')
@section('content')
    {{-- @dump($absensi) --}}

    <style>
        .container {
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .clock {
            border: 1px solid #606060;
            color: white;
            padding: 20px;
            border-radius: 10px;
            background-color: #222222;
        }

        #Date {
            font-size: 20px !important;
            text-align: center;
        }

        .clock ul {
            list-style: none;
            display: flex;
            font-size: 6vw;
            gap: 15px;
        }
    </style>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Absen PKL</h4>
                <div class="basic-form mb-4">
                    <div class="clock-layout">
                        <div class="container">
                            <div class="clock">
                                <div id="Date">Senin 26 September 2024</div>

                                <ul>
                                    <li id="hours">00</li>
                                    <li id="point">:</li>
                                    <li id="min">00</li>
                                    <li id="point">:</li>
                                    <li id="sec">00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="card-title mb-2">My Location</h4>
                <iframe id="map-frame" width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0"
                    marginwidth="0" style="border: 1px solid black"></iframe>

                <p class="card-title" id="lokasi-absensi">Lokasi Absen : </p>
                <br>
                <p class="card-title">catatan : Nyalakan lokasi Anda dan Muat ulang halaman ini jika lokasi tidak
                    ditampilkan</p>
                @if ($userRole == 'ADMIN')
                    <form id="submit-absensi" action="{{ route('admin.absensi.store') }}" method="POST">
                    @else
                        <form id="submit-absensi" action="{{ route('siswa.absensi.store') }}" method="POST">
                @endif
                @csrf
                <input type="hidden" id="siswa_id" name="siswa_id" value="{{ $absensi->pkl->siswa_id }}">
                <input type="hidden" id="pkl_id" name="pkl_id" value="{{ $absensi->pkl_id }}">
                <input type="hidden" id="jadwal_id" name="jadwal_id" value="{{ $absensi->id }}">
                <input type="hidden" id="tanggal" name="tanggal" value="{{ $absensi->tanggal }}">
                <input type="hidden" id="jam" name="jam" value="{{ $absensi->jam }}">
                <input type="hidden" id="latitude" name="latitude" value="">
                <input type="hidden" id="longitude" name="longitude" value="">
                <input type="hidden" id="lokasi_absen" name="lokasi_absen" value="">
                <input type="hidden" id="link_absen" name="link_absen" value="">
                </form>

                <div style="display: flex;flex-warp:warp; justify-content:center;" class="mt-4">
                    <a href="{{ $userRole == 'ADMIN' ? route('admin.absensi.index') : route('siswa.absensi.index') }}"
                        type="button" class="btn btn-primary"><i class="fa fa-arrow-left color-muted"></i> Back
                    </a>
                    <button id="button-submit" type="button" onclick="document.getElementById('submit-absensi').submit()"
                        class="btn btn-success ml-3" disabled>
                        Absen Now <i class="fa fa-address-book color-muted"></i>
                    </button>
                </div>

            </div>
        </div>

    </div>
    <script>
        function clock() {

            var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Augustus", "September", "Okober", "November", "Desember"
            ];
            var dayNames = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"]

            var today = new Date();

            document.getElementById('Date').innerHTML = (dayNames[today.getDay()] + " " +
                today.getDate() + ' ' + monthNames[today.getMonth()] + ' ' + today.getFullYear());

            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();

            h = h < 10 ? '0' + h : h;
            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;

            document.getElementById('hours').innerHTML = h;
            document.getElementById('min').innerHTML = m;
            document.getElementById('sec').innerHTML = s;

        }
        var inter = setInterval(clock, 1000);
    </script>

    <script>
        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Update the iframe src attribute
            var mapFrame = document.getElementById('map-frame');
            mapFrame.src = 'https://www.openstreetmap.org/export/embed.html?bbox=' + (longitude - 0.05) + '%2C' + (
                    latitude - 0.05) + '%2C' + (longitude + 0.05) + '%2C' + (latitude + 0.05) + '&layer=mapnik&marker=' +
                latitude + '%2C' + longitude;

            // Update the link href attribute
            // var mapLink = document.getElementById('map-link');
            // mapLink.href = 'https://www.openstreetmap.org/?mlat=' + latitude + '&mlon=' + longitude + '#map=15/' +
            //     latitude + '/' + longitude;
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
            document.getElementById('link_absen').value = 'https://www.openstreetmap.org/export/embed.html?bbox=' + (
                    longitude - 0.05) + '%2C' + (
                    latitude - 0.05) + '%2C' + (longitude + 0.05) + '%2C' + (latitude + 0.05) + '&layer=mapnik&marker=' +
                latitude + '%2C' + longitude;
            getAddress(latitude, longitude);
        }

        function getAddress(latitude, longitude) {
            console.log('run get address');
            var url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    var address = data.display_name;
                    console.log(address);
                    document.getElementById('lokasi-absensi').innerText = `Lokasi: ${address}`;
                    document.getElementById('lokasi_absen').value = address;
                    document.getElementById('button-submit').disabled = false;
                })
                .catch(error => {
                    console.error('Error fetching address:', error);
                });
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        // Get the location when the page loads
        window.onload = getLocation;
    </script>
    <script>
        function submitAbsensi() {



        }
    </script>
@endsection
