@extends('layouts.layout')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Table</h4>
                <a href="{{ route('admin.pkl.create') }}" class="btn mb-1 btn-outline-primary">
                    Tambah Data <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                </a>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nama PKL</th>
                                <th>Alamat PKL</th>
                                <th>Nomor Telephone</th>
                                <th>Siswa PKL</th>
                                <th>Pembimbing Sekolah</th>
                                <th>Pembimbing Industri</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($data_pkl)
                                @foreach ($data_pkl as $data)
                                    <tr>
                                        <td>{{ $data->nama_pkl }}</td>
                                        <td>{{ $data->alamat_pkl }}</td>
                                        <td>{{ $data->lokasi_pkl }}</td>
                                        <td>{{ $data->siswa->nama_siswa }}</td>
                                        <td>{{ $data->pembimbingSekolah->name }}</td>
                                        <td>{{ $data->pembimbingIndustri->name }}</td>

                                        <td>
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
                                                action="{{ route('admin.pkl.destroy', $data->id) }}" method="POST"
                                                style="display: none;">
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
