@extends('layouts.dashboard-main')
@section('main')
@php
$flag = request('flag');
$title = '';
if($flag == 1){
    $title = 'SERVICE & PRODUCTS';
}elseif($flag == 2){
    $title = 'INSIGHTS';
}elseif($flag == 3){
    $title = 'CLIENTS';
}
@endphp

<script src="https://cdn.tiny.cloud/1/lq3l90kc05n1awguo2ktyjez87p79ecvkaxv3gmbfdge6ms5/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
<script type="text/javascript">
tinymce.init({
  selector: 'textarea#editor',
  height: 500,
  plugins: [
    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
    'insertdatetime', 'media', 'table', 'help', 'wordcount',
    'mediaembed',
  ],
  toolbar: 'undo redo | blocks | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
});
</script>
<div class="card">
    <div class="card-header">
        <strong>TAMBAH {{$title}}</strong>
    </div>
    <form action="{{ isset($menu) ? route('admin.menu.update', ['flag' => $flag, 'id' => $menu->id]) : route('admin.menu.store', ['flag' => $flag]) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-body card-block">
            @csrf
            <input type="hidden" name="flag" value="{{ request('flag') }}">

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
            <!-- <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Harga</label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="price" class="form-control"
                    value="{{ old('price', isset($menu) ? $menu->price : '') }}"
                    >
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div> -->
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Deskripsi</label></div>
                <div class="col-12 col-md-9">
                    <textarea id="editor" name="desc" class="form-control" rows="4" placeholder="Masukkan teks di sini">{{ old('desc', isset($menu) ? $menu->desc : '') }}</textarea>
                    @error('desc')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <!-- <div class="row form-group">
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
            </div> -->
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Foto</label></div>
                <div class="col-12 col-md-2">
                    <input type="file" name="path_1" class="form-control">
                    @if (isset($menu) && $menu->path_1)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/app/public/'.$menu->path_1) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-2">
                    <input type="file" name="path_2" class="form-control">
                    @if (isset($menu) && $menu->path_2)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/app/public/'.$menu->path_2) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-2">
                    <input type="file" name="path_3" class="form-control">
                    @if (isset($menu) && $menu->path_3)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/app/public/'.$menu->path_3) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-2">
                    <input type="file" name="path_4" class="form-control">
                    @if (isset($menu) && $menu->path_4)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/app/public/'.$menu->path_4) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-2">
                    <input type="file" name="path_5" class="form-control">
                    @if (isset($menu) && $menu->path_5)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/app/public/'.$menu->path_5) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-2">
                    <input type="file" name="path_6" class="form-control">
                    @if (isset($menu) && $menu->path_6)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/app/public/'.$menu->path_6) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-2">
                    <input type="file" name="path_7" class="form-control">
                    @if (isset($menu) && $menu->path_7)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/app/public/'.$menu->path_7) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-2">
                    <input type="file" name="path_8" class="form-control">
                    @if (isset($menu) && $menu->path_8)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/app/public/'.$menu->path_8) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col col-md-3"></div>
                <div class="col-12 col-md-2">
                    <input type="file" name="path_9" class="form-control">
                    @if (isset($menu) && $menu->path_9)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/app/public/'.$menu->path_9) }}" alt="Preview" class="img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-2">
                    <input type="file" name="path_10" class="form-control">
                    @if (isset($menu) && $menu->path_10)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/app/public/'.$menu->path_10) }}" alt="Preview" class="img-thumbnail">
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