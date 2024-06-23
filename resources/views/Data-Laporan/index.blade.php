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
    {{-- @if (in_array($roleUser, ['ADMIN', 'PEMBIMBING INDUSTRI'])) --}}
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{-- <a href="{{ $roleUser == 'ADMIN' ? route('admin.laporan.create') : route('siswa.laporan.create') }}"
                    class="btn mb-3 btn-outline-primary">
                    Print Laporan <span class="btn-icon-right"><i class="fa fa-print"></i></span>
                </a> --}}
                <h4 class="card-title">Data Laporan PKL Siswa</h4>
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Nama PKL</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($dataSiswaPkl)
                                @foreach ($dataSiswaPkl as $data)
                                    <tr>
                                        <td>{{ $data->nama_siswa }}</td>
                                        <td>{{ $data->kelas }}</td>
                                        <td>{{ $data->jurusan }}</td>
                                        <td>{{ $data->pkl->nama_pkl }}</td>

                                        <td>
                                            @if ($roleUser == 'ADMIN')
                                                <a href="{{ route('admin.laporan.show', $data->user_id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Lihat Laporan">
                                                    <i class="fa fa-file"></i>
                                                </a>
                                            @elseif ($roleUser == 'PEMBIMBING SEKOLAH')
                                                <a href="{{ route('psekolah.laporan.show', $data->user_id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Lihat Laporan">
                                                    <i class="fa fa-file"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('pindustri.laporan.show', $data->user_id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Lihat Laporan">
                                                    <i class="fa fa-file"></i>
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

    {{-- @endif --}}


@endsection
