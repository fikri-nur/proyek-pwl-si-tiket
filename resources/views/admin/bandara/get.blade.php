@extends('admin.layout.master-admin')
@section('title', 'Data Bandara')
@section('menuBandara', 'active')

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
                    <a href="/admin/dashboard/bandara/tambah-data" class=" btn btn-sm btn-success">Tambah Data</a>
                </div>
                <table class="table table-striped table-bordered data">
                    <thead class="table-primary">
                        <tr>
                            <th>NO.</th>
                            <th>Kota</th>
                            <th>Nama Bandara</th>
                            <th colspan="2" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->kota }}</td>
                            <td>{{ $data->nama_bandara }}</td>
                            <td>
                                <a href="/admin/dashboard/bandara/update/{{$data->id_bandara}}" class=" btn btn-sm btn-primary">Update</a>
                            </td>
                            <td>
                                <a href="/admin/dashboard/bandara/delete/{{$data->id_bandara}}" class=" btn btn-sm btn-danger">Delete</a>
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