@extends('layouts.layout')
@section('content')
    {{-- @dump($kegiatan) --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4>Foto Kegiatan</h4>
                <div class="media align-items-center mb-4">
                    <img class="mr-3" src="{{ asset($nilai->dokumentasi) }}" width="100%" alt="">
                    {{-- <div class="media-body">
                        <h3 class="mb-0">Pikamy Cha</h3>
                        <p class="text-muted mb-0">Canada</p>
                    </div> --}}
                </div>

                <h4>Keterangan</h4>
                <p class="text-muted border" style="padding: 10px">{{ $nilai->keterangan }}</p>
                {{-- <ul class="card-profile__info">
                    <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>01793931609</span></li>
                    <li><strong class="text-dark mr-4">Email</strong> <span>name@domain.com</span></li>
                </ul> --}}

                {{-- <div class="row mb-5">
                    <div class="col">
                        <div class="card card-profile text-center">
                            <span class="mb-1 text-primary"><i class="icon-people"></i></span>
                            <h3 class="mb-0">263</h3>
                            <p class="text-muted px-4">Following</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-profile text-center">
                            <span class="mb-1 text-warning"><i class="icon-user-follow"></i></span>
                            <h3 class="mb-0">263</h3>
                            <p class="text-muted">Followers</p>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-danger px-5">Follow Now</button>
                    </div>
                </div> --}}


            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Penilaian</h4>
                <div class="basic-form">
                    <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="pkl_id" name="pkl_id" value="{{ $nilai->pkl_id }}">
                        <input type="hidden" id="siswa_id" name="siswa_id" value="{{ $nilai->siswa_id }}">
                        <div class="form-group">
                            <label>Nilai PKL</label>
                            <input type="text" name="nilai_pkl" class="form-control" placeholder="Nilai PKL">
                        </div>
                        <div class="form-group">
                            <label>Nilai Sikap</label>
                            <input type="text" name="nilai_sikap" class="form-control" placeholder="Nilai Sikap">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan PKL"></textarea>
                        </div>
                        <a href="{{ route('admin.kegiatan.index') }}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
