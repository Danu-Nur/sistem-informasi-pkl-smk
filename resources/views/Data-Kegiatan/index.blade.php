@extends('layouts.layout')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Table Belum isi kegiatan</h4>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nama PKL</th>
                                <th>Alamat PKL</th>
                                <th>No Telephone</th>
                                <th>Tanggal PKL</th>
                                <th>Jam PKL</th>
                                <th>Tanggal Absen</th>
                                <th>Jam Absen</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($data_absensi)
                                @foreach ($data_absensi as $data)
                                    <tr>
                                        <td>{{ $data->pkl->nama_pkl }}</td>
                                        <td>{{ $data->pkl->alamat_pkl }}</td>
                                        <td>{{ $data->pkl->lokasi_pkl }}</td>
                                        <td>{{ $data->jadwal->tanggal }}</td>
                                        <td>{{ $data->jadwal->jam }}</td>
                                        <td>{{ $data->tanggal_absen }}</td>
                                        <td>{{ $data->waktu_absen }}</td>
                                        <td>{{ $data->status_absen }}</td>

                                        <td>
                                            <a href="{{ $roleUser == 'ADMIN' ? route('admin.kegiatan.show', $data->id) : route('siswa.kegiatan.show', $data->id) }}" class="btn btn-info text-white"
                                                data-toggle="tooltip" data-placement="top" title="Tambah Kegiatan">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            {{-- <a href="#" class="ml-3 text-danger" data-toggle="tooltip"
                                                data-placement="top" title="Delete"
                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('delete-form-{{ $data->id }}').submit(); }">
                                                <i class="fa fa-trash color-danger"></i>
                                            </a>

                                            <form id="delete-form-{{ $data->id }}"
                                                action="{{ route('admin.absensi.destroy', $data->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form> --}}

                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Table Sudah isi kegiatan</h4>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nama PKL</th>
                                <th>Alamat PKL</th>
                                <th>No Telephone</th>
                                <th>Tanggal PKL</th>
                                <th>Jam PKL</th>
                                <th>Dokumentasi</th>
                                <th>Keterangan</th>
                                {{-- <th>Opsi</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            @if ($data_kegiatan)
                                @foreach ($data_kegiatan as $data)
                                    <tr>
                                        <td>{{ $data->pkl->nama_pkl }}</td>
                                        <td>{{ $data->pkl->alamat_pkl }}</td>
                                        <td>{{ $data->pkl->lokasi_pkl }}</td>
                                        <td>{{ $data->jadwal->tanggal }}</td>
                                        <td>{{ $data->jadwal->jam }}</td>
                                        <td>
                                            <img src="{{ asset($data->dokumentasi) }}" height="100px" width="100px" alt="">
                                        </td>
                                        <td>{{ $data->keterangan }}</td>

                                        {{-- <td>
                                            <a href="{{ route('admin.kegiatan.show', $data->id) }}" class="btn btn-info text-white"
                                                data-toggle="tooltip" data-placement="top" title="Tambah Kegiatan">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" class="ml-3 text-danger" data-toggle="tooltip"
                                                data-placement="top" title="Delete"
                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('delete-form-{{ $data->id }}').submit(); }">
                                                <i class="fa fa-trash color-danger"></i>
                                            </a>

                                            <form id="delete-form-{{ $data->id }}"
                                                action="{{ route('admin.absensi.destroy', $data->id) }}" method="POST"
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
