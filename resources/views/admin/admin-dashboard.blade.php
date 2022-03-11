@extends('admin.layout.master-admin')
@section('title', 'Dashboard Admin')
@section('dashboardAdmin', 'active')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        <div class="card">
            <div class="card-header">
                <h1 class="text-center"><span class="font-weight-bold text-primary">Dashboard</span></h2>
                    <div class="card-body">
                        <h2 class="text-center">Selamat datang <span class="font-weight-bold text-primary">{{ Auth::user()->name }}</span></h2>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection