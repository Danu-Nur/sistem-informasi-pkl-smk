@extends('layouts.layout')
@section('content')
    {{-- @dump($kegiatan) --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Data</h4>
                <div class="basic-form">
                    <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="pkl_id" name="pkl_id" value="{{ $kegiatan->pkl_id }}">
                        <input type="hidden" id="siswa_id" name="siswa_id" value="{{ $kegiatan->siswa_id }}">
                        <input type="hidden" id="jadwal_id" name="jadwal_id" value="{{ $kegiatan->jadwal_id }}">
                        <input type="hidden" id="absensi_id" name="absensi_id" value="{{ $kegiatan->id }}">
                        <div class="form-group">
                            <label>Foto Kegiatan</label>
                            <input type="file" name="dokumentasi" class="form-control" placeholder="Dokumentasi PKL">
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
