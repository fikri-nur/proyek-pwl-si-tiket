@extends('admin.layout.master-admin')
@section('title', 'Data Jadwal')
@section('menuJadwal', 'active')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <hr>
        <div class="card">
            <div class="card-header">
                @foreach($result as $old)
                <form action="/admin/dashboard/jadwal/update/proses/{{$old->id_jadwal}}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label for="pesawat" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pesawat - Kelas') }}</label>

                        <div class="col-md-6">
                            <select class="form-select" id="select2" aria-label=".form-select-sm example" name="pesawat">
                                <option value="{{$old->id}}" selected>{{"$old->nama_pesawat - $old->kelas"}}</option>
                                @foreach ($pesawat as $data)
                                <option value="{{$data->id}}">{{"$data->nama_pesawat - $data->kelas"}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="asal" class="col-md-4 col-form-label text-md-right">{{ __('Bandara Asal - Kota') }}</label>

                        <div class="col-md-6">
                            <select class="form-select" id="select2" aria-label=".form-select-sm example" name="asal">
                                <option value="{{$old->id_bandara_asal}}" selected>{{"$old->asal"}}</option>
                                @foreach ($bandara as $data)
                                <option value="{{$data->id_bandara}}">{{"$data->nama_bandara - $data->kota"}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tujuan" class="col-md-4 col-form-label text-md-right">{{ __('Bandara Tujuan - Kota') }}</label>

                        <div class="col-md-6">
                            <select class="form-select" id="select2" aria-label=".form-select-sm example" name="tujuan">
                                <option value="{{$old->id_bandara_tujuan}}" selected>{{"$old->tujuan"}}</option>
                                @foreach ($bandara as $data)
                                <option value="{{$data->id_bandara}}">{{"$data->nama_bandara - $data->kota"}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Pergi') }}</label>

                        <div class="col-md-6">
                            <input type="date" class="form-control datepicker" name='date' placeholder="" value="{{$old->tgl}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Jam Pergi') }}</label>

                        <div class="col-md-6">
                            <input type="time" class="form-control" name='time' placeholder="" value="{{$old->jam}}">
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-md btn-primary">Update</button>
                    </div>
                </form>
                <a href="/admin/dashboard/jadwal"><button type="submit" class="btn btn-md btn-danger">Cancel</button></a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection