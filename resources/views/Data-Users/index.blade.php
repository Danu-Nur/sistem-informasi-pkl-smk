@extends('layouts.layout')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Table</h4>
                <a href="{{ route('admin.user.create') }}" class="btn mb-1 btn-outline-primary">
                    Tambah Data <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data_users)
                                @foreach ($data_users as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>
                                            @if ($data->role == 'SUPER')
                                                <span class="label label-primary">Super Admin</span>
                                            @elseif ($data->role == 'ADMIN')
                                                <span class="label label-secondary">Admin</span>
                                            @elseif ($data->role == 'PEMBIMBING SEKOLAH')
                                                <span class="label label-success">Pembimbing Sekolah</span>
                                            @else
                                                <span class="label label-warning">Pembimbing Industri</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $data->id) }}" class="text-secondary"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil color-muted"></i>
                                            </a>
                                            <a href="#" class="ml-3 text-danger" data-toggle="tooltip"
                                                data-placement="top" title="Delete"
                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('delete-form-{{ $data->id }}').submit(); }">
                                                <i class="fa fa-trash color-danger"></i>
                                            </a>

                                            <form id="delete-form-{{ $data->id }}"
                                                action="{{ route('admin.user.destroy', $data->id) }}" method="POST"
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
