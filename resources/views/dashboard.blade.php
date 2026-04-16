@extends('layouts.dashboard-main')
@section('main')

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

<form action="{{ route('master.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if(session('success'))
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif


            {{-- HALAMAN ABOUT --}}
            <div class="card">
                <div class="card-header"><strong>Halaman Who We Are</strong></div>
                <div class="card-body card-block">
                    <div class="row form-group">


                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label">Foto Sertifikat 1</label>
                                <input type="file" name="foto_sejarah_1" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_sejarah_1) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label">Foto Sertifikat 2</label>
                                <input type="file" name="foto_sejarah_2" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_sejarah_2) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label">Foto Sertifikat 3</label>
                                <input type="file" name="foto_sejarah_3" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_sejarah_3) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label">Foto Sertifikat 4</label>
                                <input type="file" name="foto_sejarah_4" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_sejarah_4) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi Who We Are</label>
                                                
                                  <div id="editor"></div>
                                  <textarea id="markup" name="sejarah" style="display: none;"></textarea>
                                @error('sejarah')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>
                        

                    </div>


                        {{-- PHOTO 10 PCS --}}

                            <label class="form-control-label"><strong>Foto Card</strong></label>
                    <div class="row form-group">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="file" name="foto_card_1" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_card_1) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="file" name="foto_card_2" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_card_2) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <br>
                            <div class="form-group">
                                <input type="file" name="foto_card_3" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_card_3) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <br>
                            <div class="form-group">
                                <input type="file" name="foto_card_4" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_card_4) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <br>
                            <div class="form-group">
                                <input type="file" name="foto_card_5" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_card_5) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <br>
                            <div class="form-group">
                                <input type="file" name="foto_card_6" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_card_6) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <br>
                            <div class="form-group">
                                <input type="file" name="foto_card_7" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_card_7) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <br>
                            <div class="form-group">
                                <input type="file" name="foto_card_8" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_card_8) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <br>
                            <div class="form-group">
                                <input type="file" name="foto_card_9" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_card_9) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-6">
                            <br>
                            <div class="form-group">
                                <input type="file" name="foto_card_10" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_card_10) }}" class="w-100 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            {{-- FOOTER --}}
            <div class="card">
                <div class="card-header"><strong>Bagian Footer</strong></div>
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Title Footer</label>
                                <input type="text" 
                                       value="{{ $master->title_footer }}" 
                                       name="title_footer"
                                       class="form-control">
                                @error('title_footer')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi</label>
                                <textarea name="desc" class="form-control" rows="5">{{ $master->desc }}</textarea>
                                @error('desc')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                        {{-- LINK SOSMED --}}
                        <div class="col-12 px-3 ">
                            <label class="form-control-label"><strong>Link</strong></label>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">Instagram</label>
                                    <input type="text" 
                                           value="{{ $master->link_instagram }}" 
                                           name="link_instagram"
                                           class="form-control">
                                    @error('link_instagram')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">Facebook</label>
                                    <input type="text" 
                                           value="{{ $master->link_facebook }}" 
                                           name="link_facebook"
                                           class="form-control">
                                    @error('link_facebook')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">Youtube</label>
                                    <input type="text" 
                                           value="{{ $master->link_youtube }}" 
                                           name="link_youtube"
                                           class="form-control">
                                    @error('link_youtube')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">Tiktok</label>
                                    <input type="text" 
                                           value="{{ $master->link_tiktok }}" 
                                           name="link_tiktok"
                                           class="form-control">
                                    @error('link_tiktok')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="5">{{ $master->alamat }}</textarea>
                                @error('alamat')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Link Maps</label>
                                <input type="text" 
                                       value="{{ $master->link_maps }}" 
                                       name="link_maps"
                                       class="form-control">
                                @error('link_maps')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">No Whatsapp</label>
                                <input type="text" 
                                       value="{{ $master->whatsapp }}" 
                                       name="whatsapp"
                                       class="form-control">
                                @error('whatsapp')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">No Telp Kantor</label>
                                <input type="text" 
                                       value="{{ $master->phone_office }}" 
                                       name="phone_office"
                                       class="form-control">
                                @error('phone_office')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Email 1 (Utama)</label>
                                <input type="email" 
                                       value="{{ $master->email }}" 
                                       name="email"
                                       class="form-control">
                                @error('email')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Email 2</label>
                                <input type="email" 
                                       value="{{ $master->email_2 }}" 
                                       name="email_2"
                                       class="form-control">
                                @error('email_2')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Email 3</label>
                                <input type="email" 
                                       value="{{ $master->email_3 }}" 
                                       name="email_3"
                                       class="form-control">
                                @error('email_3')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>

    <div class="row">
        <div class="col-lg-12" align="center">
            <button type="submit" class="btn btn-primary btn-sm mt-2 w-50">
                <i class="fa fa-dot-circle-o"></i> Save
            </button>
            <br>
            <br>
        </div>
    </div>
</form>

<script src="https://unpkg.com/pell"></script>
<script type="text/javascript">
    const pell = window.pell;
const editor = document.getElementById("editor");
const markup = document.getElementById("markup");
const initialContent = @json($master->sejarah ?? '');

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
