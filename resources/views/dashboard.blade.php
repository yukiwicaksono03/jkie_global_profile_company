@extends('layouts.dashboard-main')
@section('main')

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
                                <textarea id="editor" name="sejarah" class="form-control" rows="5">{{ $master->sejarah }}</textarea>
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
                                <label class="form-control-label">Email</label>
                                <input type="email" 
                                       value="{{ $master->email }}" 
                                       name="email"
                                       class="form-control">
                                @error('email')
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
@endsection
