@extends('layouts.dashboard-main')
@section('main')
<form action="{{ isset($category) ? route('admin.category.update', $category->id) : route('admin.category.store') }}" method="POST" class="form-horizontal">
    @csrf
    @if(isset($category))
        @method('PUT')
    @endif
    <div class="card">
        <div class="card-header">
            <strong>Kategori</strong>
        </div>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Nama</label></div>
                <div class="col-12 col-md-9"><input type="text" name="name" class="form-control"  value="{{ isset($category) ? $category->name : "" }}"></div>
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
    </div>
</form>
@endsection