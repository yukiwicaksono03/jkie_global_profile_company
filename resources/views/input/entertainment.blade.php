@extends('layouts.dashboard-main')
@section('main')
<div class="card">
    <div class="card-header">
        <strong>Wahana</strong>
    </div>
    <form action="{{ isset($entertainment) ? route('entertainment.update', $entertainment->id) : route('entertainment.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-body card-block">
            @csrf

            @if(isset($entertainment))
                @method('PUT')
            @endif
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Foto </label></div>
                <div class="col-lg-3">
                    <input type="file" name="path_1" class="form-control">
                    @error('path_1')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @if (isset($entertainment) && $entertainment->path_1)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/'.$entertainment->path_1) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col-lg-3">
                    <input type="file" name="path_2" class="form-control">
                    @error('path_2')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @if (isset($entertainment) && $entertainment->path_2)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/'.$entertainment->path_2) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col-lg-3">
                    <input type="file" name="path_3" class="form-control">
                    @error('path_3')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @if (isset($entertainment) && $entertainment->path_3)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/'.$entertainment->path_3) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Nama Wahana</label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="title" class="form-control" placeholder="Masukkan teks di sini"
                    value="{{ old('title', isset($entertainment) ? $entertainment->title : '') }}"
                    >
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Harga Weekday</label></div>
                <div class="col-12 col-md-9">
                    <input type="number" name="price_weekday" class="form-control"
                    value="{{ old('price_weekday', isset($entertainment) ? $entertainment->price_weekday : '') }}"
                    >
                    @error('price_weekday')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Harga Weekend</label></div>
                <div class="col-12 col-md-9">
                    <input type="number" name="price_weekend" class="form-control"
                    value="{{ old('price_weekend', isset($entertainment) ? $entertainment->price_weekend : '') }}"
                    >
                    @error('price_weekend')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class="form-control-label">Deskripsi</label></div>
                <div class="col-12 col-md-9">
                    <textarea name="desc" class="form-control" rows="4" placeholder="Masukkan teks di sini">{{ old('desc', isset($entertainment) ? $entertainment->desc : '') }}</textarea>
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