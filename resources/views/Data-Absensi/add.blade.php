@extends('layouts.layout')
@section('content')
    {{-- @dump($absensi) --}}
    <style>
        .clock-layout {
            width: 100%;
            background: black;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .clock {
            height: 20vh;
            color: white;
            font-size: 22vh;
            font-family: sans-serif;
            line-height: 20.4vh;
            display: flex;
            position: relative;
            /*background: green;*/
            overflow: hidden;
        }

        .clock::before,
        .clock::after {
            content: "";
            width: 7ch;
            height: 3vh;
            background: linear-gradient(to top, transparent, black);
            position: absolute;
            z-index: 2;
        }

        .clock::after {
            bottom: 0;
            background: linear-gradient(to bottom, transparent, black);
        }

        .clock>div {
            display: flex;
        }

        .tick {
            line-height: 17vh;
        }

        .tick-hidden {
            opacity: 0;
        }

        .move {
            animation: move linear 1s infinite;
        }

        @keyframes move {
            from {
                transform: translateY(0vh);
            }

            to {
                transform: translateY(-20vh);
            }
        }
    </style>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Data</h4>
                <div class="basic-form">
                    <div class="clock-layout">
                        <div class="clock">
                            <div class="hours">
                                <div class="first">
                                    <div class="number">0</div>
                                </div>
                                <div class="second">
                                    <div class="number">0</div>
                                </div>
                            </div>
                            <div class="tick">:</div>
                            <div class="minutes">
                                <div class="first">
                                    <div class="number">0</div>
                                </div>
                                <div class="second">
                                    <div class="number">0</div>
                                </div>
                            </div>
                            <div class="tick">:</div>
                            <div class="seconds">
                                <div class="first">
                                    <div class="number">0</div>
                                </div>
                                <div class="second infinite">
                                    <div class="number">0</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <form action="{{ route('admin.pkl.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama PKL</label>
                            <input type="text" name="nama_pkl" class="form-control" placeholder="Nama PKL">

                        </div>
                        <div class="form-group">
                            <label>Alamat PKL</label>
                            <input type="text" name="alamat_pkl" class="form-control" placeholder="Alamat PKL">
                        </div>
                        <div class="form-group">
                            <label>Lokasi PKL</label>
                            <input type="text" name="lokasi_pkl" class="form-control" placeholder="Nomor Telephone">
                        </div> --}}
                    {{-- <div class="form-group">
                            <label>Siswa PKL</label>
                            <select id="inputState" name="siswa_id" class="form-control">
                                @if ($data_siswa)
                                    @foreach ($data_siswa as $siswa)
                                        <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}
                                        </option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pembimbing Sekolah</label>
                            <select id="inputState" name="psekolah_id" class="form-control">
                                @if ($data_psekolah)
                                    @foreach ($data_psekolah as $psekolah)
                                        <option value="{{ $psekolah->id }}">{{ $psekolah->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pembimbing Industri</label>
                            <select id="inputState" name="pindustri_id" class="form-control">
                                @if ($data_pindustri)
                                    @foreach ($data_pindustri as $pindustri)
                                        <option value="{{ $pindustri->id }}">{{ $pindustri->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div> --}}
                    {{-- <a href="{{ route('admin.pkl.index') }}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        var hoursContainer = document.querySelector('.hours')
        var minutesContainer = document.querySelector('.minutes')
        var secondsContainer = document.querySelector('.seconds')
        var tickElements = Array.from(document.querySelectorAll('.tick'))

        var last = new Date(0)
        last.setUTCHours(-1)

        var tickState = true

        function updateTime() {
            var now = new Date

            var lastHours = last.getHours().toString()
            var nowHours = now.getHours().toString()
            if (lastHours !== nowHours) {
                updateContainer(hoursContainer, nowHours)
            }

            var lastMinutes = last.getMinutes().toString()
            var nowMinutes = now.getMinutes().toString()
            if (lastMinutes !== nowMinutes) {
                updateContainer(minutesContainer, nowMinutes)
            }

            var lastSeconds = last.getSeconds().toString()
            var nowSeconds = now.getSeconds().toString()
            if (lastSeconds !== nowSeconds) {
                //tick()
                updateContainer(secondsContainer, nowSeconds)
            }

            last = now
        }

        function tick() {
            tickElements.forEach(t => t.classList.toggle('tick-hidden'))
        }

        function updateContainer(container, newTime) {
            var time = newTime.split('')

            if (time.length === 1) {
                time.unshift('0')
            }


            var first = container.firstElementChild
            if (first.lastElementChild.textContent !== time[0]) {
                updateNumber(first, time[0])
            }

            var last = container.lastElementChild
            if (last.lastElementChild.textContent !== time[1]) {
                updateNumber(last, time[1])
            }
        }

        function updateNumber(element, number) {
            //element.lastElementChild.textContent = number
            var second = element.lastElementChild.cloneNode(true)
            second.textContent = number

            element.appendChild(second)
            element.classList.add('move')

            setTimeout(function() {
                element.classList.remove('move')
            }, 990)
            setTimeout(function() {
                element.removeChild(element.firstElementChild)
            }, 990)
        }

        setInterval(updateTime, 1000)
    </script>
@endsection
