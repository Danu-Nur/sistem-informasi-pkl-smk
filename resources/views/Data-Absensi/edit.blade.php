@extends('layouts.layout')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Update Data</h4>
                <div class="basic-form">
                    <form action="{{ route('admin.pkl.update', $pkl->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama PKL</label>
                            <input type="text" name="nama_pkl" class="form-control" placeholder="Nama PKL"
                                value="{{ $pkl->nama_pkl }}">

                        </div>
                        <div class="form-group">
                            <label>Alamat PKL</label>
                            <input type="text" name="alamat_pkl" class="form-control" placeholder="Alamat PKL"
                                value="{{ $pkl->alamat_pkl }}">
                        </div>
                        <div class="form-group">
                            <label>Lokasi PKL</label>
                            <input type="text" name="lokasi_pkl" class="form-control" placeholder="Nomor Telephone"
                                value="{{ $pkl->lokasi_pkl }}">
                        </div>
                        <div class="form-group">
                            <label>Siswa PKL</label>
                            <select id="inputState" name="siswa_id" class="form-control">
                                @if ($data_siswa)
                                    @foreach ($data_siswa as $siswa)
                                        <option value="{{ $siswa->id }}"
                                            {{ $siswa->id == $pkl->siswa_id ? 'selected' : '' }}>{{ $siswa->nama_siswa }}
                                        </option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pembimbing Sekolah</label>
                            <select id="inputState" name="psekolah_id" class="form-control">
                                @if ($data_psekolah)
                                    @foreach ($data_psekolah as $psekolah)
                                        <option value="{{ $psekolah->id }}"
                                            {{ $psekolah->id == $pkl->psekolah_id ? 'selected' : '' }}>{{ $psekolah->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pembimbing Industri</label>
                            <select id="inputState" name="pindustri_id" class="form-control">
                                @if ($data_pindustri)
                                    @foreach ($data_pindustri as $pindustri)
                                        <option value="{{ $pindustri->id }}"
                                            {{ $pindustri->id == $pkl->pindustri_id ? 'selected' : '' }}>
                                            {{ $pindustri->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <a href="{{ route('admin.pkl.index') }}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
