@extends('layouts.layout')
@section('content')
@dump($kegiatan)
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Data</h4>
                <div class="basic-form">
                    <form action="{{ route('admin.jadwal.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Siswa PKL</label>
                            <select id="inputState" name="pkl_id" class="form-control">
                                {{-- @if ($data_pkl)
                                    @foreach ($data_pkl as $pkl)
                                        <option value="{{ $pkl->id }}">{{ $pkl->nama_pkl }}
                                        </option>
                                    @endforeach
                                @endif --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal PKL">
                        </div>
                        <div class="form-group">
                            <label>Jam</label>
                            <input type="time" name="jam" class="form-control" placeholder="Jam PKL">
                        </div>
                        <a href="{{ route('admin.jadwal.index') }}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
