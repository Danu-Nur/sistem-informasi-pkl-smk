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

                <p class="card-title">Turn On your location and Refresh this page if location not show</p>


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
            var mapLink = document.getElementById('map-link');
            mapLink.href = 'https://www.openstreetmap.org/?mlat=' + latitude + '&mlon=' + longitude + '#map=15/' +
                latitude + '/' + longitude;
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
@endsection
