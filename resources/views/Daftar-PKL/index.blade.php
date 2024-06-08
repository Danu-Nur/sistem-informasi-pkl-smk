@extends('layouts.layout')
@section('content')
    {{-- @dump($idusersiswa)
    @dump($emailusersiswa) --}}
    @if (count($cekdaftarpkl) > 0)
        <div class="row" style="display: flex; flex-wrap:wrap; justify-content:center;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="display-5"><i class="icon-check gradient-1-text"></i></span>
                            <h2 class="mt-3">Daftar PKL Success</h2>
                            <p>Anda Sudah Mendaftar PKL</p>
                            {{-- <a href="javascript:void()" class="btn gradient-3 btn-lg border-0 btn-rounded px-5">Download now</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Daftar PKL</h4>
                    <div class="basic-form">
                        <form action="{{ route('siswa.siswa.store') }}" method="POST">
                            @csrf
                            <input type="hidden" id="user_id" name="user_id" value="{{ $idusersiswa }}">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa"
                                    value="{{ $nameusersiswa }}">
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
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ $emailusersiswa }}">
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
                            {{-- <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div> --}}
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password">
                            </div>
                            {{-- <a href="{{ route('siswa.siswa.index') }}" type="button" class="btn btn-primary">Back</a> --}}
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
