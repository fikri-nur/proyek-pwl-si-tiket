@extends('layouts.master')
@section('title', 'Dashboard')
@section('menuDashboard', 'active')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>
                        Daftar Tiket Anda
                    </h2>
                </div>

                <div class="card-body text-center">
                    <div class="row">
                        <div class="col">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" >×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <table class=" table table-bordered table-striped">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>NO Booking</th>
                                        <th>Nama</th>
                                        <th>Pesawat</th>
                                        <th>Kelas</th>
                                        <th>Asal</th>
                                        <th>Tujuan</th>
                                        <th>Tanggal Pergi</th>
                                        <th>Jam Pergi</th>
                                        <th>Harga/Tiket</th>
                                        <th>Jumlah Tiket</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Bayar</th>
                                        <th>Batalkan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($result as $val)
                                    <tr>
                                        <td>{{ $val->id }}</td>
                                        <td>{{ $val->nama }}</td>
                                        <td>{{ $val->pesawat }}</td>
                                        <td>{{ $val->kelas }}</td>
                                        <td>{{ $val->asal }}</td>
                                        <td>{{ $val->tujuan }}</td>
                                        <td>{{ $val->tgl_pergi }}</td>
                                        <td>{{ $val->jam_pergi }}</td>
                                        <td>Rp.{{ $val->harga }}</td>
                                        <td>{{ $val->jumlah_tiket }}</td>
                                        <td>Rp.{{ $val->harga_total }}</td>
                                        <td>{{ $val->status_pembayaran }}</td>
                                        <td><a href="/tiket/pesawat/bayar/{{$val->id}}" class="btn btn-success btn-xs {{ $val->status_pembayaran == 'SUDAH DIBAYAR' ? 'disabled' : ''}} ;">Bayar</a></td>
                                        <td><a href="/tiket/pesawat/batalkan/{{$val->id}}" class="btn btn-danger btn-xs {{ $val->status_pembayaran == 'SUDAH DIBAYAR' ? 'disabled' : ''}} ;">Batalkan</a></td>
                                        @empty
                                        <div class="alert alert-dark d-inline-block">Anda belum memesan tiket</div>
                                        @endforelse
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection