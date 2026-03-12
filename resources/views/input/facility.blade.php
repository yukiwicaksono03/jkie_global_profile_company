@extends('layouts.dashboard-main')
@section('main')
<div class="card">
    <div class="card-header">
        <strong>Fasilitas</strong>
    </div>
    <form action="{{ isset($facility) ? route('admin.facility.update', $facility->id) : route('admin.facility.store') }}"  method="POST" class="form-horizontal">
        <div class="card-body card-block">
            @csrf
            @if(isset($facility))
                @method('PUT')
            @endif
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Title</label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="name" class="form-control" value="{{ old('name', isset($facility) ? $facility->name : '') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Deskripsi</label></div>
                <div class="col-12 col-md-9">
                    <textarea name="desc" class="form-control" rows="4" placeholder="Masukkan teks di sini"> {{ old('desc', isset($facility) ? $facility->desc : '') }}</textarea>
                    @error('desc')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </form>
</div>
@endsection