@extends('layouts.layout')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Update Data</h4>
                <div class="basic-form">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama User"
                                value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telephone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Nomor Telephone"
                                value="{{ $user->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select id="inputState" name="role" class="form-control">
                                <option value="SUPER" {{ $user->role == 'SUPER' ? 'selected' : '' }}>Super Admin</option>
                                <option value="ADMIN" {{ $user->role == 'ADMIN' ? 'selected' : '' }}>Admin</option>
                                <option value="PEMBIMBING SEKOLAH"
                                    {{ $user->role == 'PEMBIMBING SEKOLAH' ? 'selected' : '' }}>Pembimbing Sekolah</option>
                                <option value="PEMBIMBING INDUSTRI"
                                    {{ $user->role == 'PEMBIMBING INDUSTRI' ? 'selected' : '' }}>Pembimbing Industri
                                </option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                        <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
