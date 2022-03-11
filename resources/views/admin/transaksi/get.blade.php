@extends('admin.layout.master-admin')
@section('title', 'Data Transaksi')
@section('menuTransaksi', 'active')

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
                            <th>Pesawat</th>
                            <th>Kelas</th>
                            <th>Harga</th>
                            <th>Jumlah Tiket</th>
                            <th>Metode Bayar</th>
                            <th>Kode Bayar</th>
                            <th>Total Bayar</th>
                            <th>Waktu Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nama_pesawat }}</td>
                            <td>{{ $data->kelas }}</td>
                            <td>{{ $data->harga }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->metode }}</td>
                            <td>{{ $data->kode_bayar }}</td>
                            <td>{{ $data->total_bayar }}</td>
                            <td>{{ $data->waktu_bayar }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection