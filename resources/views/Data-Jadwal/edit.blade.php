@extends('layouts.layout')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Update Data</h4>
                <div class="basic-form">
                    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Siswa PKL</label>
                            <select id="inputState" name="pkl_id" class="form-control">
                                @if ($data_pkl)
                                    @foreach ($data_pkl as $pkl)
                                        <option value="{{ $pkl->id }}" {{ $jadwal->id == $pkl->id ? 'selected' : '' }}>
                                            {{ $pkl->nama_pkl }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal PKL" value="{{ $jadwal->tanggal }}">
                        </div>
                        <div class="form-group">
                            <label>Jam</label>
                            <input type="time" name="jam" class="form-control" placeholder="Jam PKL" value="{{ $jadwal->jam }}">
                        </div>
                        <a href="{{ route('admin.jadwal.index') }}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
