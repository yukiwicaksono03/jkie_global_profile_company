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

<link rel="stylesheet" type="text/css" href="https://unpkg.com/pell/dist/pell.min.css">
<style type="text/css">
 
.pell-actionbar {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  padding: 8px;
  background: #f8f9fb;
  border: 1px solid #ddd;

}

.pell-button {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 34px;
  height: 34px;
  border-radius: 6px;
  border: none;
  background: white;
  cursor: pointer;
  transition: all 0.2s ease;
  font-size: 14px;
}

.pell-button:hover {
  background: #e9ecef;
}

.pell-button:active {
  background: #d0d5dd;
}

.pell-content {
  padding: 12px;
  min-height: 200px;
  font-size: 14px;
  line-height: 1.6;
  border: 1px solid #ddd;

}
</style>

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
            <div class="row form-group" style="{{ ($flag == 3) ? '' : 'display:none;' }}">
                <div class="col col-md-3"><label class=" form-control-label">Tipe Client</label></div>
                <div class="col-12 col-md-9">
                <select id="type_client" name="type_client">
                    <option value="" {{ old('type_client', $menu->type_client ?? '') == '0' ? 'selected' : '' }}></option>
                    <option value="1" {{ old('type_client', $menu->type_client ?? '') == '1' ? 'selected' : '' }}>Overseas Project</option>
                    <option value="2" {{ old('type_client', $menu->type_client ?? '') == '2' ? 'selected' : '' }}>Indonesia & Overseas Project</option>
                </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Deskripsi</label></div>
                <div class="col-12 col-md-9">

                  <div id="editor"></div>
                  <textarea id="markup" name="desc" style="display: none;"></textarea>
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

<script src="https://unpkg.com/pell"></script>
<script type="text/javascript">
    const pell = window.pell;
const editor = document.getElementById("editor");
const markup = document.getElementById("markup");
const initialContent = @json($menu->desc ?? '');

  markup.innerHTML = initialContent;

pell.init({
  element: editor,
  onChange: (html) => {
    markup.innerText = html;
  },

  actions: [
    {
      name: 'bold',
      icon: '<b>B</b>',
      title: 'Bold',
      result: () => document.execCommand('bold')
    },
    {
      name: 'italic',
      icon: '<i>I</i>',
      title: 'Italic',
      result: () => document.execCommand('italic')
    },
    {
      name: 'underline',
      icon: '<u>U</u>',
      title: 'Underline',
      result: () => document.execCommand('underline')
    },
    {
      name: 'strikethrough',
      icon: '<strike>S</strike>',
      title: 'Strike-through',
      result: () => document.execCommand('strikeThrough')
    },
    {
      name: 'heading1',
      icon: '<b>H <sub>1</sub></b>',
      title: 'Heading 1',
      result: () => document.execCommand('formatBlock', false, 'h1')
    },
    {
      name: 'heading2',
      icon: '<b>H <sub>2</sub></b>',
      title: 'Heading 2',
      result: () => document.execCommand('formatBlock', false, 'h2')
    },
    {
      name: 'paragraph',
      icon: '¶',
      title: 'Paragraph',
      result: () => document.execCommand('formatBlock', false, 'p')
    },
    {
      name: 'quote',
      icon: '“ ”',
      title: 'Quote',
      result: () => document.execCommand('formatBlock', false, 'blockquote')
    },
    {
      name: 'olist',
      icon: '#',
      title: 'Ordered List',
      result: () => document.execCommand('insertOrderedList')
    },
    {
      name: 'ulist',
      icon: '•',
      title: 'Unordered List',
      result: () => document.execCommand('insertUnorderedList')
    },
    {
      name: 'code',
      icon: '&lt;/&gt;',
      title: 'Code',
      result: () => document.execCommand('formatBlock', false, 'pre')
    },
    {
      name: 'line',
      icon: '―',
      title: 'Horizontal Line',
      result: () => document.execCommand('insertHorizontalRule')
    },
    {
      name: 'link',
      icon: '🔗',
      title: 'Link',
      result: () => {
        const url = prompt('Enter URL');
        if (url) document.execCommand('createLink', false, url);
      }
    },
    {
      name: 'image',
      icon: '📷',
      title: 'Image',
      result: () => {
        const url = prompt('Enter image URL');
        if (url) document.execCommand('insertImage', false, url);
      }
    },
    {
      name: 'left',
      icon: '<svg width="16" height="16"><rect width="16" height="2" y="2"/><rect width="12" height="2" y="6"/><rect width="16" height="2" y="10"/></svg>',
      title: 'Align Left',
      result: () => document.execCommand('justifyLeft')
    },
    {
      name: 'center',
      icon: '<svg width="16" height="16"><rect width="12" height="2" x="2" y="2"/><rect width="16" height="2" y="6"/><rect width="12" height="2" x="2" y="10"/></svg>',
      title: 'Align Center',
      result: () => document.execCommand('justifyCenter')
    },
    {
      name: 'right',
      icon: '<svg width="16" height="16"><rect width="16" height="2" y="2"/><rect width="12" height="2" x="4" y="6"/><rect width="16" height="2" y="10"/></svg>',
      title: 'Align Right',
      result: () => document.execCommand('justifyRight')
    },
    {
      name: 'justify',
      icon: '<svg width="16" height="16"><rect width="16" height="2" y="2"/><rect width="16" height="2" y="6"/><rect width="16" height="2" y="10"/></svg>',
      title: 'Justify',
      result: () => document.execCommand('justifyFull')
    }
  ]
})

  editor.content.innerHTML = initialContent;

</script>

@endsection