@extends('layouts.master')
@section('title', 'Pembayaran')

@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Berikut Adalah <span class="font-weight-bold text-primary">Tiket</span></h2>
                        <h1 class="text-center">Pesanan <span class="font-weight-bold text-primary">Anda</span></h2>

                            <div class="card-body">
                                <form method="POST" action="{{ url('/tiket/pesawat/bayar/proses') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID Booking') }}</label>

                                        <div class="col-md-6">
                                            <input type="hidden" name="id" value="{{$result->id}}">
                                            <input class="form-control" name="" type="text" value="{{$result->id}}" aria-label="Disabled input example" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="nama" type="text" value="{{$result->nama}}" aria-label="Disabled input example" disabled readonly>
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
                                        <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga Satuan') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="harga" type="text" value="{{$result->harga}}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="jumlah" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah') }}</label>

                                        <div class="col-md-6">
                                            <input class="form-control" name="jumlah" type="text" value="{{$result->jumlah}}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="harga_total" class="col-md-4 col-form-label text-md-right">{{ __('Harga Total') }}</label>

                                        <div class="col-md-6">
                                            <input type="hidden" name="harga_total" value="{{$result->harga_total}}">
                                            <input class="form-control" name="" type="text" value="{{$result->harga_total}}" aria-label="Disabled input example" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="metode" class="col-md-4 col-form-label text-md-right">{{ __('Metode Pembayaran') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select" id="select2" aria-label=".form-select-sm example" name="metode">
                                                <option value="Transfer Virtual Account" selected>Transfer Virtual Account</option>
                                                <option value="OVO">OVO</option>
                                                <option value="GoPay">GoPay</option>
                                                <option value="Dana">Dana</option>
                                                <option value="Link Aja">LINK AJA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">{{ __('Bayar') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                </div>
            </div>
        </div>
    </div>
    @endsection