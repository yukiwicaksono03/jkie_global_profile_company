@extends('layouts.dashboard-main')
@section('main')
<div class="card">
    <div class="card-header">
        <strong>Slider</strong>
    </div>
    <form action="{{ isset($slider) ? route('slider.update', $slider->id) : route('slider.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-body card-block">
            @csrf

            @if(isset($slider))
                @method('PUT')
            @endif
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Foto</label></div>
                <div class="col-12 col-md-9">
                    <input type="file" name="path" class="form-control">
                    @error('path')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @if (isset($slider) && $slider->path)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/'.$slider->path) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Deskripsi</label></div>
                <div class="col-12 col-md-9">
                    <textarea name="desc" class="form-control" rows="4" placeholder="Masukkan teks di sini">{{ old('desc', isset($slider) ? $slider->desc : '') }}</textarea>
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