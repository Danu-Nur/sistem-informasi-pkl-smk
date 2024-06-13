@extends('layouts.layout')
@section('content')
    <style>
        th,
        td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            /* white-space: nowrap; */
        }
    </style>
    {{-- @dump(count($data_nilai) > 0 ? $data_nilai : 'kosong') --}}
    {{-- @dump($roleUser) --}}
    @if (count($data_nilai) > 0)
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($roleUser == 'ADMIN')
                        <a href="{{ route('admin.laporan.edit', $idUser) }}" class="btn mb-3 btn-outline-primary">
                            Print Laporan <span class="btn-icon-right"><i class="fa fa-print"></i></span>
                        </a>
                    @elseif($roleUser == 'SISWA')
                        <a href="{{ route('siswa.laporan.create') }}" class="btn mb-3 btn-outline-primary">
                            Print Laporan <span class="btn-icon-right"><i class="fa fa-print"></i></span>
                        </a>
                    @else
                        <a href="{{ route('pindustri.laporan.edit', $idUser) }}" class="btn mb-3 btn-outline-primary">
                            Print Laporan <span class="btn-icon-right"><i class="fa fa-print"></i></span>
                        </a>
                    @endif

                    <h4 class="card-title">Data PKL Sudah di Nilai</h4>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Nama PKL</th>
                                    <th>Tanggal PKL</th>
                                    <th>Jam PKL</th>
                                    <th>Tanggal Absen</th>
                                    <th>Jam Absen</th>
                                    <th>Status Absen</th>
                                    <th>Foto Kegiatan</th>
                                    <th>Keterangan Kegiatan</th>
                                    <th>Nilai PKL</th>
                                    <th>Nilai Sikap</th>
                                    <th>Keterangan</th>
                                    {{-- <th>Opsi</th> --}}
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($data_nilai as $data)
                                    <tr>
                                        <td>{{ $data->siswa->nama_siswa }}</td>
                                        <td>{{ $data->kegiatan->jadwal->pkl->nama_pkl }}</td>
                                        <td>{{ $data->kegiatan->jadwal->tanggal }}</td>
                                        <td>{{ $data->kegiatan->jadwal->jam }}</td>
                                        <td>{{ $data->kegiatan->absensi->tanggal_absen }}</td>
                                        <td>{{ $data->kegiatan->absensi->waktu_absen }}</td>
                                        <td>{{ $data->kegiatan->absensi->status_absen }}</td>
                                        <td>
                                            <img src="{{ asset($data->kegiatan->dokumentasi) }}" height="100px"
                                                width="100px" alt="">
                                        </td>
                                        <td>{{ $data->kegiatan->keterangan }}</td>
                                        <td>{{ $data->nilai_pkl }}</td>
                                        <td>{{ $data->nilai_sikap }}</td>
                                        <td>{{ $data->keterangan }}</td>

                                        {{-- <td>
                                        <a href="{{ route('admin.nilai.edit', $data->id) }}"
                                            data-toggle="tooltip" data-placement="top" title="Edit Kegiatan">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" class="ml-3 text-danger" data-toggle="tooltip"
                                            data-placement="top" title="Delete"
                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('delete-form-{{ $data->id }}').submit(); }">
                                            <i class="fa fa-trash color-danger"></i>
                                        </a>

                                        <form id="delete-form-{{ $data->id }}"
                                            action="{{ route('admin.nilai.destroy', $data->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </td> --}}
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row" style="display: flex; flex-wrap:wrap; justify-content:center;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="display-5"><i class="icon-close gradient-1-text"></i></span>
                            <h2 class="mt-3">Kegitan Belum Dinilai</h2>
                            <p>Harap Menghubungi Pembimbing untuk Menilai Kegiatan</p>
                            {{-- <a href="javascript:void()" class="btn gradient-3 btn-lg border-0 btn-rounded px-5">Download now</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
