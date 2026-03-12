@extends('layouts.main')
@section('main')
<div class="container" style="margin-top: 100px; margin-bottom: 200px">
    <p class="fw-bold text-center fs-2">
        Our Core Services
    </p>
    <p class="text-center fs-6 mb-5">
        {{ $master->desc_our_menu }}
    </p>
    <div class="d-flex justify-content-center gap-2 flex-wrap mb-5">
        @forelse ($categories as $item)
            <a href="/menu?category={{ $item->id }}" class="btn  {{ request('category') == $item->id ? 'btn-green' : 'btn-green-outline' }}" style="width: fit-content;">{{ $item->name }}</a>
        @empty
            <div class="text-center">
                Tidak ada kategori tersedia.
            </div>
        @endforelse
    </div>
    <div class="row d-flex justify-content-center gap-3 align-items-stretch">
        @forelse ($menu as $item)
            <div class="p-0 col-lg-3">
                <div class="card"style="cursor:pointer"
                    onclick="openPreview(
                        '{{ asset('storage/'.$item->path) }}',
                        '{{ $item->name }}',
                        '{{ $item->desc }}',
                        '{{ rupiah($item->price) }}'
                    )" >
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('storage/'.$item->path) }}"
                            class="rounded"
                            style="width:100%; height:100%; object-fit:cover;"
                            alt="foto menu" >
                    </div>
                    <div class="p-3 mt-1">
                        <p class="fs-5 text-center fw-bold">{{ $item->name }}</p>
                        {{-- <p class="fs-6 text-center">
                            {{ rupiah($item->price) }}
                        </p> --}}
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                Tidak ada menu tersedia.
            </div>
        @endforelse
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
@push('script')
    <script>
        function openPreview(image, name, desc, price) {
            document.getElementById('previewImage').src = image;
            document.getElementById('previewName').innerText = name;
            document.getElementById('previewDesc').innerText = desc;
            document.getElementById('previewPrice').innerText = price;

            const modal = new bootstrap.Modal(
                document.getElementById('productPreviewModal')
            );
            modal.show();
        }
    </script>
@endpush