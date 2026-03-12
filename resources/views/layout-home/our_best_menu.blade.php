<div class="container" style="margin-top: 200px; margin-bottom: 200px">
    <p class="fw-bold text-center fs-2 mb-3">
        Our Core Services
    </p>
    <p class="text-center fs-6 mb-5">
        {{ $master->desc_our_menu_home }}
    </p>
    <div class="row d-flex justify-content-center gap-3 align-items-stretch">
        @foreach ($menu as $item)
            <div class="p-2 col-lg-4 mb-4">
                <div class="card" style="cursor:pointer"
                    onclick="window.location.href='{{ route('menu_detail',$item->id) }}'" >
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('storage/'.$item->path) }}"
                            class="rounded"
                            style="width:100%; height:100%; object-fit:cover;"
                            alt="foto menu" >
                    </div>
                    <div class="p-3 mt-1">
                        <p class="fs-5 text-center ">{{ $item->name }}</p>
                        <p class="fs-6 text-center fw-bold">
                            Read More
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
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