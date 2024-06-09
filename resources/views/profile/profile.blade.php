@extends('layouts.layout')
@section('content')
    <div class="col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center mb-4">
                    <span class="mb-1 text-primary" style="font-size: 100px">
                        <i class="icon-people"></i>
                    </span>
                </div>
                <form action="{{ route('admin.profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label><strong>Nama</strong></label>
                        <input type="text" name="name" class="form-control" placeholder="Nama User"
                            value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label><strong>Email</strong></label>
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label><strong>Password</strong></label>
                        <input type="text" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-danger px-5">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
