@extends('layouts.master')
@section('title', 'Daftar Tiket')
@section('menuTiketPesawat', 'active')

@section('content')
<div class="container text-center mt-3 p-4 bg-white text-primary">
    <h1>Daftar Tiket Yang Tersedia</h1>
    <div class="row">
        <div class="col">
            <table class=" table table-bordered table-striped">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>NO</th>
                        <th>Nama Pesawat</th>
                        <th>Kelas</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Tanggal Pergi</th>
                        <th>Jam Pergi</th>
                        <th>Harga</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($result as $val)
                    <tr>
                        <td>{{ $val->id }}</td>
                        <td>{{ $val->pesawat }}</td>
                        <td>{{ $val->kelas }}</td>
                        <td>{{ $val->asal }}</td>
                        <td>{{ $val->tujuan }}</td>
                        <td>{{ $val->tgl_pergi }}</td>
                        <td>{{ $val->jam_pergi }}</td>
                        <td>Rp.{{ $val->harga }}</td>
                        <td><a href="/tiket/pesawat/detail-ticket/{{$val->id}}" class="btn btn-primary btn-xs">Beli</a></td>
                        @empty
                        <div class="alert alert-dark d-inline-block">Tidak ada data...</div>
                        @endforelse
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection