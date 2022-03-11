@extends('layouts.master')
@section('title', 'Tiket Pesawat')
@section('menuTiketPesawat', 'active')

@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Cari Tiket <span class="font-weight-bold text-primary">Pesawat</span></h2>

                        <div class="card-body">
                            <form method="POST" action="{{ url('/tiket/pesawat/search') }}">
                                @csrf
                                <input type="hidden" name="jenis" value="pesawat">

                                <div class="row mb-3">
                                    <label for="asal" class="col-md-4 col-form-label text-md-right">{{ __('Bandara Asal') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-select" id="select2" aria-label=".form-select-sm example" name="asal">
                                            <option selected>Pilih</option>
                                            @foreach ($result as $data)
                                            <option value="{{$data->id_bandara}}">{{"$data->kota - $data->nama_bandara"}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tujuan" class="col-md-4 col-form-label text-md-right">{{ __('Bandara Tujuan') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-select" id="select2" aria-label=".form-select-sm example" name="tujuan">
                                            <option selected>Pilih</option>
                                            @foreach ($result as $data)
                                            <option value="{{$data->id_bandara}}">{{"$data->kota - $data->nama_bandara"}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Pergi') }}</label>

                                    <div class="col-md-6">
                                        <input type="date" class="form-control datepicker" name='date' placeholder="">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">{{ __('Cari') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    @endsection