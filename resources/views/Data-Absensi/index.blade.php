@extends('layouts.layout')
@section('content')
    {{-- @dump($data_absensi) --}}
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Table Jadwal</h4>
                {{-- <a href="{{ route('admin.absensi.create') }}" class="btn mb-1 btn-outline-primary">
                    Tambah Data <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                </a> --}}

                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nama PKL</th>
                                <th>Alamat PKL</th>
                                <th>Lokasi PKL</th>
                                <th>Tanggal PKL</th>
                                <th>Jam PKL</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($data_jadwal)
                                @foreach ($data_jadwal as $data)
                                    <tr>
                                        <td>{{ $data->pkl->nama_pkl }}</td>
                                        <td>{{ $data->pkl->alamat_pkl }}</td>
                                        <td>{{ $data->pkl->lokasi_pkl }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->jam }}</td>

                                        <td>
                                            <a href="{{ route('admin.absensi.show', $data->id) }}" class="btn btn-success text-white"
                                                data-toggle="tooltip" data-placement="top" title="Absen Sekarang">
                                                <i class="fa fa-address-book color-muted"></i>
                                            </a>

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
                <h4 class="card-title">Data Table Absensi</h4>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nama PKL</th>
                                <th>Alamat PKL</th>
                                <th>Lokasi PKL</th>
                                <th>Tanggal PKL</th>
                                <th>Jam PKL</th>
                                <th>Tanggal Absen</th>
                                <th>Jam Absen</th>
                                <th>Status</th>
                                {{-- <th>Opsi</th> --}}
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

                                        {{-- <td>
                                            <a href="{{ route('admin.pkl.edit', $data->id) }}" class="text-secondary"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil color-muted"></i>
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
