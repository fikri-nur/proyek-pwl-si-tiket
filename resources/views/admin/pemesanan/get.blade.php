@extends('admin.layout.master-admin')
@section('title', 'Data Pemesanan')
@section('menuPemesanan', 'active')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        @if(Session::has('success'))
        <div class="alert alert-success">
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif
        <hr>
        <div class="card">
            <div class="card-header">
                <table class="table table-striped table-bordered data">
                    <thead class="table-primary">
                        <tr>
                            <th>NO.</th>
                            <th>Nama</th>
                            <th>No Telp</th>
                            <th>Pesawat</th>
                            <th>Kelas</th>
                            <th>Bandara Asal</th>
                            <th>Bandara Tujuan</th>
                            <th>Jumlah Tiket</th>
                            <th>Waktu Pesan</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->telp }}</td>
                            <td>{{ $data->nama_pesawat }}</td>
                            <td>{{ $data->kelas }}</td>
                            <td>{{ $data->asal }}</td>
                            <td>{{ $data->tujuan }}</td>
                            <td>{{ $data->jumlah_tiket }}</td>
                            <td>{{ $data->waktu_pesan }}</td>
                            <td>{{ $data->status_pembayaran }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection