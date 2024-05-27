@extends('Auth.Layout.layout')

@section('content')
    <div class="form-input-content">
        <div class="card login-form mb-0">
            <div class="card-body pt-5">
                <a class="text-center" href="index.html">
                    <h4>LOGIN</h4>
                </a>
                <style>
                    .containers {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                    }
                </style>

                <div class="containers">
                    <h1>LOGO</h1>
                </div>

                <form class="mt-5 mb-5 login-input" action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" id="email_address" name="email"
                            required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password"
                            required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <input type="checkbox" id="remember-me" name="remember">
                            <label for="remember-me" style="margin-left: 10px">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <button class="btn login-form__btn submit w-100">Login</button>
                </form>

                {{-- <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p> --}}
            </div>
        </div>
    </div>
@endsection
