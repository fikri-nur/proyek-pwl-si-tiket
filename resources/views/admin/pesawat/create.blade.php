@extends('admin.layout.master-admin')
@section('title', 'Data Pesawat')
@section('menuPesawat', 'active')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        <div class="card">
            <div class="card-header">
                <form action="/admin/dashboard/pesawat/tambah-data/proses" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pesawat') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="nama" type="text" value="" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kelas" class="col-md-4 col-form-label text-md-right">{{ __('Kelas') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="kelas" type="text" value="" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="harga" type="text" value="" required>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
                <a href="/admin/dashboard/pesawat"><button type="submit" class="btn btn-md btn-danger">Cancel</button></a>
            </div>
        </div>
    </div>
</div>
@endsection