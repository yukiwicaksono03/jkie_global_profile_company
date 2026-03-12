@extends('layouts.dashboard-main')
@section('main')
<div class="card">
    <div class="card-header">
        <strong>Event</strong>
    </div>
    <form action="{{ isset($event) ? route('admin.event.update', $event->id) : route('admin.event.store') }}"  method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-body card-block">
            @csrf
            @if(isset($event))
                @method('PUT')
            @endif
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Title</label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="name" class="form-control" value="{{ old('name', isset($event) ? $event->name : '') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Deskripsi</label></div>
                <div class="col-12 col-md-9">
                    <textarea name="desc" class="form-control" rows="4" placeholder="Masukkan teks di sini"> {{ old('desc', isset($event) ? $event->desc : '') }}</textarea>
                    @error('desc')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Tanggal</label></div>
                <div class="col-12 col-md-9">
                    <input type="date" name="date" class="form-control" value="{{ old('date', isset($event) ? $event->date : '') }}">
                    @error('date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Jam Mulai</label></div>
                <div class="col-12 col-md-9">
                    <input type="time" name="start_time" class="form-control" value="{{ old('start_time', isset($event) ? $event->start_time : '') }}">
                    @error('start_time')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class="form-control-label">Jam Selesai</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="time" 
                        name="end_time" 
                        id="end_time"
                        class="form-control" 
                        value="{{ old('end_time', isset($event) ? $event->end_time : '') }}"
                        {{ old('until_finish', isset($event) && $event->end_time === null) ? 'disabled' : '' }}>
                    
                    <label class="mt-2 d-block">
                        <input type="checkbox" 
                            name="until_finish" 
                            id="until_finish"
                            value="1"
                            {{ old('until_finish', isset($event) && $event->end_time === null) ? 'checked' : '' }}>
                        Sampai selesai
                    </label>
                    
                    @error('end_time')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Foto</label></div>
                <div class="col-12 col-md-9">
                    <input type="file" name="photo" class="form-control">
                    @error('photo')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @if (isset($event) && $event->photo)
                        <div class="mt-5" id="preview-wrapper">
                            <img src="{{ asset('storage/'.$event->photo) }}" alt="Preview" class="img-thumbnail">
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

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('until_finish');
    const endTimeInput = document.getElementById('end_time');
    
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            endTimeInput.value = '';  
            endTimeInput.disabled = true; 
        } else {
            endTimeInput.disabled = false;  
        }
    });
});
</script>
@endpush