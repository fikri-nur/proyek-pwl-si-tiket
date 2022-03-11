@extends('layouts.master')
@section('title', 'Register')
@section('menuRegister', 'active')

@section('content')

<div class="container-xxl-1">
    <div class="row">
        <div class="col-lg-6 p-5">
            <div class="col-lg-12">
                <h1 class="text-center">Silahkan <span class="font-weight-bold text-primary">Registrasi</span></h1>
            </div>
            <div class="col px-5">
                <br>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>

                    <div class="form-group">
                        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" 
                        name="nik" value="{{ old('nik') }}" required autocomplete="nik" placeholder="NIK">

                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>

                    <div class="form-group">
                        <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" 
                        name="telp" value="{{ old('telp') }}" required autocomplete="telp" placeholder="Nomor Telepon">

                        @error('telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                        name="password" required autocomplete="new-password" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" 
                        name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <input type="submit" name="" value="Register" class="btn btn-primary btn-block w-100">
                    </div>
                </form>
            </div>
            <div class="col px-5 py-4">
                <p>Sudah punya akun? <a class="text-primary text-decoration-none" href="{{ route('login') }}">Login Disini</a></p>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('img/register.jpg') }}" class="w-100" alt="index">
        </div>
    </div>
</div>

@endsection