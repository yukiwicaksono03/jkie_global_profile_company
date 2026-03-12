@extends('layouts.main')
@section('main')
<div class="container" style="margin-top: 100px; margin-bottom: 200px">
    <p class="fw-bold text-center fs-2">
        {{ $menu->name }}
    </p>
    <div class="row d-flex justify-content-center gap-3 align-items-stretch">
            
                    <div class="ratio ratio-4x3" style="width:50%">
                        <img src="{{ asset('storage/'.$menu->path) }}"
                            class="rounded"
                            style="width:100%; height:100%; object-fit:cover;"
                            alt="foto menu" >
                    </div>
            <div class="text-center" style="text-wrap:auto; width:70%;">
                {!! $menu->desc !!}
            </div>
        
    </div>
</div>

<div class="modal fade" id="productPreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="previewName"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row g-3 align-items-center">

                    <div class="col-md-6">
                        <img id="previewImage"
                             src=""
                             class="img-fluid rounded"
                             alt="">
                    </div>

                    <div class="col-md-6">
                        <p id="previewDesc" class="text-muted"></p>
                        <p id="previewPrice" class="text-muted"></p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection