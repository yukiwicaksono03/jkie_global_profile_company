@extends('layouts.dashboard-main')
@section('main')
<form action="{{ route('master.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary btn-sm mt-2 w-100">
                <i class="fa fa-dot-circle-o"></i> Save
            </button>
        </div>
    </div>
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

    <div class="row mt-3">
        {{-- KOLOM KIRI --}}
        <div class="col-lg-6">

            {{-- HALAMAN HOME --}}
            <div class="card">
                <div class="card-header"><strong>Halaman Home</strong></div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Sapa</label>
                                <input type="text"  
                                    value="{{ $master->greating_home_1 }}" 
                                    name="greating_home_1" 
                                    class="form-control">
                                    @error('greating_home_1')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Slug</label>
                                <input type="text" 
                                    value="{{ $master->greating_home_2 }}" 
                                    name="greating_home_2" 
                                    class="form-control">
                                    @error('greating_home_2')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi</label>
                                <input type="text" 
                                    value="{{ $master->greating_home_3 }}" 
                                    name="greating_home_3" 
                                    class="form-control">
                                @error('greating_home_3')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                        {{-- KEDAI --}}
                        <div class="col-12 px-3">
                            <label class="form-control-label"><strong>Kedai</strong></label>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Senin</label>
                                    <input type="text" 
                                        value="{{ $master->kedai_senin }}" 
                                        class="form-control" 
                                        name="kedai_senin">
                                    @error('kedai_senin')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Selasa</label>
                                    <input type="text" 
                                        value="{{ $master->kedai_selasa }}" 
                                        class="form-control" 
                                        name="kedai_selasa">
                                    @error('kedai_selasa')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Rabu</label>
                                    <input type="text" 
                                        value="{{ $master->kedai_rabu }}" 
                                        class="form-control" 
                                        name="kedai_rabu">
                                    @error('kedai_rabu')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Kamis</label>
                                    <input type="text" 
                                        value="{{ $master->kedai_kamis }}" 
                                        class="form-control" 
                                        name="kedai_kamis">
                                    @error('kedai_kamis')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Jumat</label>
                                    <input type="text" 
                                        value="{{ $master->kedai_jumat }}" 
                                        class="form-control" 
                                        name="kedai_jumat">
                                    @error('kedai_jumat')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Sabtu</label>
                                    <input type="text" 
                                        value="{{ $master->kedai_sabtu }}" 
                                        class="form-control" 
                                        name="kedai_sabtu">
                                    @error('kedai_sabtu')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Minggu</label>
                                    <input type="text" 
                                        value="{{ $master->kedai_minggu }}" 
                                        class="form-control" 
                                        name="kedai_minggu">
                                    @error('kedai_minggu')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- WAHANA --}}
                        <div class="col-12 px-3">
                            <label class="form-control-label"><strong>Wahana</strong></label>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Senin</label>
                                    <input type="text" 
                                        value="{{ $master->wahana_senin }}" 
                                        class="form-control" 
                                        name="wahana_senin">
                                    @error('wahana_senin')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Selasa</label>
                                    <input type="text" 
                                        value="{{ $master->wahana_selasa }}" 
                                        class="form-control" 
                                        name="wahana_selasa">
                                    @error('wahana_selasa')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Rabu</label>
                                    <input type="text" 
                                        value="{{ $master->wahana_rabu }}" 
                                        class="form-control" 
                                        name="wahana_rabu">
                                    @error('wahana_rabu')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Kamis</label>
                                    <input type="text" 
                                        value="{{ $master->wahana_kamis }}" 
                                        class="form-control" 
                                        name="wahana_kamis">
                                    @error('wahana_kamis')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Jumat</label>
                                    <input type="text" 
                                        value="{{ $master->wahana_jumat }}" 
                                        class="form-control" 
                                        name="wahana_jumat">
                                    @error('wahana_jumat')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Sabtu</label>
                                    <input type="text" 
                                        value="{{ $master->wahana_sabtu }}" 
                                        class="form-control" 
                                        name="wahana_sabtu">
                                    @error('wahana_sabtu')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="form-control-label">Minggu</label>
                                    <input type="text" 
                                        value="{{ $master->wahana_minggu }}" 
                                        class="form-control" 
                                        name="wahana_minggu">
                                    @error('wahana_minggu')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Slider --}}
                         <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Durasi Slider (millidetik)</label>
                                <input type="number" 
                                    value="{{ $master->slider_delay }}" 
                                    name="slider_delay" 
                                    class="form-control">
                                    @error('slider_delay')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                            </div>
                        </div>

                        {{-- MENU DESC HOME --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Menu Deskripsi Home</label>
                                <textarea name="desc_our_menu_home" class="form-control" rows="5">{{ $master->desc_our_menu_home }}</textarea>
                                @error('desc_our_menu_home')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                        {{-- EVENT DESC HOME --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Event Deskripsi Home</label>
                                <textarea name="desc_event_home" class="form-control" rows="5">{{ $master->desc_event_home }}</textarea>
                                @error('desc_event_home')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- HALAMAN MENU & EVENT --}}
            <div class="card">
                <div class="card-header"><strong>Halaman Menu & Halaman Event</strong></div>
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Menu Deskripsi</label>
                                <textarea name="desc_our_menu" class="form-control" rows="5">{{ $master->desc_our_menu }}</textarea>
                                @error('desc_our_menu')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Event Deskripsi</label>
                                <textarea name="desc_event" class="form-control" rows="5">{{ $master->desc_event }}</textarea>
                                @error('desc_event')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        {{-- KOLOM KANAN --}}
        <div class="col-lg-6">

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

                    </div>
                </div>
            </div>
            {{-- HALAMAN ABOUT --}}
            <div class="card">
                <div class="card-header"><strong>Halaman About</strong></div>
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Visi</label>
                                <textarea name="visi" class="form-control" rows="5">{{ $master->visi }}</textarea>
                                @error('visi')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Misi</label>
                                <textarea name="misi" class="form-control" rows="5">{{ $master->misi }}</textarea>
                                @error('misi')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Foto Sejarah 1</label>
                                <input type="file" name="foto_sejarah_1" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_sejarah_1) }}" class="w-50 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Foto Sejarah 2</label>
                                <input type="file" name="foto_sejarah_2" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_sejarah_2) }}" class="w-50 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Foto Sejarah 3</label>
                                <input type="file" name="foto_sejarah_3" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_sejarah_3) }}" class="w-50 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Foto Sejarah 4</label>
                                <input type="file" name="foto_sejarah_4" class="form-control">
                                <img src="{{ asset('storage/'.$master->foto_sejarah_4) }}" class="w-50 mt-3" data-aos="fade-up">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Sejarah</label>
                                <textarea name="sejarah" class="form-control" rows="5">{{ $master->sejarah }}</textarea>
                                @error('sejarah')
                                    <small class="text-danger">Field ini harus di isi</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Desc Fasilitas</label>
                                <input type="text"  
                                    value="{{ $master->desc_facilities }}" 
                                    name="desc_facilities" 
                                    class="form-control">
                                    @error('desc_facilities')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Desc Wahana</label>
                                <input type="text"  
                                    value="{{ $master->desc_wahana }}" 
                                    name="desc_wahana" 
                                    class="form-control">
                                    @error('desc_wahana')
                                        <small class="text-danger">Field ini harus di isi</small>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
