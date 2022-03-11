@extends('layouts.master')
@section('title', 'Login')
@section('menuLogin', 'active')

@section('content')

<div class="container-xxl-1">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ asset('img/login.jpg') }}" class="w-100" alt="index">
        </div>
        <div class="col-lg-6">
            <div class="col-lg-12 p-5">
                <h1 class="text-center">Silahkan <span class="font-weight-bold text-primary">Login</span></h2>
                    <h1 class="text-center">Sebelum <span class="font-weight-bold text-primary">Memesan</span></h2>
            </div>
            <div class="col px-5">
                <br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-8 text-end">
                            @if (Route::has('password.request'))
                            <a class="text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <input type="submit" name="" value="Login" class="btn btn-primary btn-block w-100">
                    </div>
                </form>

            </div>
            <div class="col px-5 py-4">
                <p>Belum punya akun? <a class="text-primary text-decoration-none" href="{{ route('register') }}">Daftar disini</a></p>
            </div>
        </div>
    </div>
</div>

@endsection