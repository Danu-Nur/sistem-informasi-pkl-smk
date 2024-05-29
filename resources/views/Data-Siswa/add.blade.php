@extends('layouts.layout')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Data</h4>
                <div class="basic-form">
                    <form action="{{ route('admin.siswa.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa">
                        </div>
                        <div class="form-group">
                            <label>Nomor Induk</label>
                            <input type="text" name="nomor_induk" class="form-control" placeholder="Nomor Induk">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" style="height: 200px"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telephone</label>
                            <input type="text" name="telp" class="form-control" placeholder="Nomor Telephone">
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select id="inputState" name="kelas" class="form-control">
                                <option selected="selected">Choose...</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select id="inputState" name="jurusan" class="form-control">
                                <option selected="selected">Choose...</option>
                                <option value="TKJ">TKJ</option>
                                <option value="TKR">TKR</option>
                                <option value="AKT">AKT</option>
                                <option value="MM">MM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
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
