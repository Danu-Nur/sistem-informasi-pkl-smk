@extends('layouts.layout')
@section('content')
    {{-- @dump($idUserSiswa)
    @dump($data_user) --}}
    @if (count($data_user) > 0)
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Data</h4>
                    <div class="basic-form">
                        <form action="{{ route('admin.siswa.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Pilih User Login Siswa</label>
                                <select id="user_id" name="user_id" class="form-control">
                                    <option selected="selected">Choose...</option>
                                    @foreach ($data_user as $item)
                                        <option value="{{ $item->id }}" data-name="{{ $item->name }}"
                                            data-email="{{ $item->email }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" id="nama_siswa" name="nama_siswa" class="form-control"
                                    placeholder="Nama Siswa" value="">
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
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                    value="">
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
                                    <option value="AKL">AKL</option>
                                    <option value="DKV">DKV</option>
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password">
                            </div> --}}
                            <a href="{{ route('admin.siswa.index') }}" type="button" class="btn btn-primary">Back</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var userSelect = document.getElementById('user_id');
                var namaSiswaInput = document.getElementById('nama_siswa');
                var emailInput = document.getElementById('email');

                userSelect.addEventListener('change', function() {
                    var selectedOption = userSelect.options[userSelect.selectedIndex];
                    var name = selectedOption.getAttribute('data-name');
                    var email = selectedOption.getAttribute('data-email');

                    namaSiswaInput.value = name || '';
                    emailInput.value = email || '';
                });
            });
        </script>
    @else
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body" style="display:flex;flex-wrap:wrap;justify-content: center;text-align:center;">
                    <h1>Tambahkan User Login untuk siswa terlebih dahulu pada menu User</h1>
                    <a href="{{ route('admin.siswa.index') }}" type="button" class="btn btn-primary mt-5 mr-3">Back</a>
                    <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-secondary mt-5 text-white">Tambah Data User</a>

                </div>
            </div>
        </div>
    @endif
@endsection
