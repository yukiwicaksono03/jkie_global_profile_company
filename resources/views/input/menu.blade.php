@extends('layouts.dashboard-main')
@section('main')
<div class="card">
    <div class="card-header">
        <strong>Menu</strong>
    </div>
    <form action="{{ isset($menu) ? route('admin.menu.update', $menu->id) : route('admin.menu.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-body card-block">
            @csrf

            @if(isset($menu))
                @method('PUT')
            @endif

            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Nama</label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="name" class="form-control"
                    value="{{ old('name', isset($menu) ? $menu->name : '') }}"
                    >
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Harga</label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="price" class="form-control"
                    value="{{ old('price', isset($menu) ? $menu->price : '') }}"
                    >
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Deskripsi</label></div>
                <div class="col-12 col-md-9">
                    <textarea name="desc" class="form-control" rows="4" placeholder="Masukkan teks di sini">{{ old('desc', isset($menu) ? $menu->desc : '') }}</textarea>
                    @error('desc')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Kategori</label></div>
                <div class="col-12 col-md-9">
                    <select name="category_id" class="form-control">
                        <option value="">Please select</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}"
                                {{ isset($menu) && $menu->category_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Best Menu</label></div>
                <div class="col-12 col-md-9">
                    <select name="is_best" class="form-control">
                        <option value="0" {{ isset($menu) && $menu->is_best == false ? 'selected' : '' }}>Tidak</option>
                        <option value="1" {{ isset($menu) && $menu->is_best == true ? 'selected' : '' }}>Ya</option>
                    </select>
                    @error('is_best')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Foto</label></div>
                <div class="col-12 col-md-9">
                    <input type="file" name="path" class="form-control">
                    @error('path')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @if (isset($menu) && $menu->path)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/'.$menu->path) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
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