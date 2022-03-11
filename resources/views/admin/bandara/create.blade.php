@extends('admin.layout.master-admin')
@section('title', 'Data Bandara')
@section('menuBandara', 'active')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        <div class="card">
            <div class="card-header">
                <form action="/admin/dashboard/bandara/tambah-data/proses" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label for="kota" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="kota" type="text" value="" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nama_bandara" class="col-md-4 col-form-label text-md-right">{{ __('Nama Bandara') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" name="nama_bandara" type="text" value="" required>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
                <a href="/admin/dashboard/bandara"><button type="submit" class="btn btn-md btn-danger">Cancel</button></a>
            </div>
        </div>
    </div>
</div>
@endsection