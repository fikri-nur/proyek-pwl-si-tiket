@extends('layouts.master')
@section('title', 'Pesan Tiket')
@section('menuTiketPesawat', 'active')

@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Berikut Adalah <span class="font-weight-bold text-primary">Tiket</span></h2>
                        <h1 class="text-center">Pesanan <span class="font-weight-bold text-primary">Anda</span></h2>

                            <div class="card-body">
                                <form method="POST" action="{{ url('/tiket/pesawat/pesan') }}">
                                    @csrf

                                    <input type="hidden" name="id_jadwal" value="{{$result->id}}">
                                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                                    <div class="row mb-3">
                                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="nama" type="text" value="{{ Auth::user()->name }}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="nik" type="text" value="{{ Auth::user()->nik }}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="telp" type="text" value="{{ Auth::user()->telp }}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="jumlah" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Tiket') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select" id="select2" aria-label=".form-select-sm example" name="jumlah">
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="pesawat" class="col-md-4 col-form-label text-md-right">{{ __('Pesawat') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="pesawat" type="text" value="{{$result->pesawat}}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="kelas" class="col-md-4 col-form-label text-md-right">{{ __('Kelas') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="kelas" type="text" value="{{$result->kelas}}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="asal" class="col-md-4 col-form-label text-md-right">{{ __('Bandara Asal') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="asal" type="text" value="{{$result->asal}}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="tujuan" class="col-md-4 col-form-label text-md-right">{{ __('Bandara Tujuan') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="tujuan" type="text" value="{{$result->tujuan}}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Pergi') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="date" type="text" value="{{$result->tgl_pergi}}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="jam" class="col-md-4 col-form-label text-md-right">{{ __('Jam Pergi') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="jam" type="text" value="{{$result->jam_pergi}}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="harga" type="text" value="{{$result->harga}}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">{{ __('Pesan') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                </div>
            </div>
        </div>
    </div>
    @endsection