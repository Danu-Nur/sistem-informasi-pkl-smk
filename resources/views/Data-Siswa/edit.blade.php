@extends('layouts.layout')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Data</h4>
                <div class="basic-form">
                    <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa" value="{{ $siswa->nama_siswa }}">
                        </div>
                        <div class="form-group">
                            <label>Nomor Induk</label>
                            <input type="text" name="nomor_induk" class="form-control" placeholder="Nomor Induk" value="{{ $siswa->nomor_induk }}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" style="height: 200px">{{ $siswa->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $siswa->email }}">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telephone</label>
                            <input type="text" name="telp" class="form-control" placeholder="Nomor Telephone" value="{{ $siswa->telp }}">
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select id="inputState" name="kelas" class="form-control">
                                <option>Choose...</option>
                                <option value="X" {{ $siswa->kelas == 'X' ? 'selected="selected"' : '' }}>X</option>
                                <option value="XI" {{ $siswa->kelas == 'XI' ? 'selected="selected"' : '' }}>XI</option>
                                <option value="XII" {{ $siswa->kelas == 'XII' ? 'selected="selected"' : '' }}>XII</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select id="inputState" name="jurusan" class="form-control">
                                <option>Choose...</option>
                                <option value="TKJ" {{ $siswa->jurusan == 'TKJ' ? 'selected="selected"' : '' }}>TKJ</option>
                                <option value="TKR" {{ $siswa->jurusan == 'TKR' ? 'selected="selected"' : '' }}>TKR</option>
                                <option value="AKT" {{ $siswa->jurusan == 'AKT' ? 'selected="selected"' : '' }}>AKT</option>
                                <option value="MM" {{ $siswa->jurusan == 'MM' ? 'selected="selected"' : '' }}>MM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" value="{{ $siswa->username }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                        <a href="{{ route('admin.siswa.index') }}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
