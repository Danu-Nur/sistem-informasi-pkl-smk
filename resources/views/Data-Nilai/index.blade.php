@extends('layouts.layout')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data PKL Belum di Nilai</h4>

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
                                <th>Opsi</th>
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
                                            <img src="{{ asset($data->dokumentasi) }}" height="100px" width="100px"
                                                alt="">
                                        </td>
                                        <td>{{ substr($data->keterangan, 0, 20) }}</td>

                                        <td>
                                            @if ($userRole == 'ADMIN')
                                                <a href="{{ route('admin.nilai.show', $data->id) }}"
                                                    class="btn btn-info text-white" data-toggle="tooltip"
                                                    data-placement="top" title="Nilai PKL">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('pindustri.nilai.show', $data->id) }}"
                                                    class="btn btn-info text-white" data-toggle="tooltip"
                                                    data-placement="top" title="Nilai PKL">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif

                                            {{-- <a href="#" class="ml-3 text-danger" data-toggle="tooltip"
                                                data-placement="top" title="Delete"
                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('delete-form-{{ $data->id }}').submit(); }">
                                                <i class="fa fa-trash color-danger"></i>
                                            </a>

                                            <form id="delete-form-{{ $data->id }}"
                                                action="{{ route('admin.nilai.destroy', $data->id) }}" method="POST"
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
                <h4 class="card-title">Data PKL Sudah di Nilai</h4>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nama PKL</th>
                                <th>Tanggal PKL</th>
                                <th>Jam PKL</th>
                                <th>Nama Siswa</th>
                                <th>Nilai PKL</th>
                                <th>Nilai Sikap</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($data_nilai)
                                @foreach ($data_nilai as $data)
                                    <tr>
                                        <td>{{ $data->kegiatan->jadwal->pkl->nama_pkl }}</td>
                                        <td>{{ $data->kegiatan->jadwal->tanggal }}</td>
                                        <td>{{ $data->kegiatan->jadwal->jam }}</td>
                                        <td>{{ $data->siswa->nama_siswa }}</td>
                                        <td>{{ $data->nilai_pkl }}</td>
                                        <td>{{ $data->nilai_sikap }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                        {{-- <td>
                                            <img src="{{ asset($data->dokumentasi) }}" height="100px" width="100px" alt="">
                                        </td> --}}

                                        <td>
                                            @if ($userRole == 'ADMIN')
                                                <a href="{{ route('admin.nilai.edit', $data->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Edit Kegiatan">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('pindustri.nilai.edit', $data->id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Edit Kegiatan">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @endif
                                            <a href="#" class="ml-3 text-danger" data-toggle="tooltip"
                                                data-placement="top" title="Delete"
                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('delete-form-{{ $data->id }}').submit(); }">
                                                <i class="fa fa-trash color-danger"></i>
                                            </a>

                                            @if ($userRole == 'ADMIN')
                                                <form id="delete-form-{{ $data->id }}"
                                                    action="{{ route('admin.nilai.destroy', $data->id) }}" method="POST"
                                                    style="display: none;">
                                                @else
                                                    <form id="delete-form-{{ $data->id }}"
                                                        action="{{ route('pindustri.nilai.destroy', $data->id) }}"
                                                        method="POST" style="display: none;">
                                            @endif
                                            @csrf
                                            @method('DELETE')
                                            </form>

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
@endsection
