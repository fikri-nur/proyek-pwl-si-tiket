@extends('admin.layout.master-admin')
@section('title', 'Data Pesawat')
@section('menuPesawat', 'active')

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
                <div class="py-2 text-end">
                    <a href="/admin/dashboard/pesawat/tambah-data" class=" btn btn-sm btn-success">Tambah Data</a>
                </div>
                <table class="table table-striped table-bordered data">
                    <thead class="table-primary">
                        <tr>
                            <th>NO.</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Harga</th>
                            <th colspan="2" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_pesawat }}</td>
                            <td>{{ $data->kelas }}</td>
                            <td>{{ $data->harga }}</td>
                            <td>
                                <a href="/admin/dashboard/pesawat/update/{{$data->id}}" class=" btn btn-sm btn-primary">Update</a>
                            </td>
                            <td>
                                <a href="/admin/dashboard/pesawat/delete/{{$data->id}}" class=" btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection