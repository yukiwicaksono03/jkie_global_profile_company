@extends('layouts.dashboard-main')
@section('main')
<div class="card">
    <div class="card-header">
        <strong>Gallery</strong>
    </div>
    <form action="{{ isset($gallery) ? route('gallery.update', $gallery->id) : route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-body card-block">
            @csrf

            @if(isset($gallery))
                @method('PUT')
            @endif
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Foto</label></div>
                <div class="col-12 col-md-9">
                    <input type="file" name="path" class="form-control">
                    @error('path')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @if (isset($gallery) && $gallery->path)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/'.$gallery->path) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Title</label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="title" class="form-control" placeholder="Masukkan teks di sini"
                    value="{{ old('title', isset($gallery) ? $gallery->title : '') }}"
                    >
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Deskripsi</label></div>
                <div class="col-12 col-md-9">
                    <textarea name="desc" class="form-control" rows="4" placeholder="Masukkan teks di sini">{{ old('desc', isset($gallery) ? $gallery->desc : '') }}</textarea>
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