@extends('layouts.layout')
@section('content')
    <style>
        th,
        td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ $roleUser == 'ADMIN' ? route('admin.laporan.create') : route('siswa.laporan.create') }}"
                    class="btn mb-3 btn-outline-primary">
                    Print Laporan <span class="btn-icon-right"><i class="fa fa-print"></i></span>
                </a>
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

                            @if ($data_nilai)
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
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
