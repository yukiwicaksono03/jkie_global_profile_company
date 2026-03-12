@push('style')
    <style>
        .event-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .event-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.12);
        }

        .event-card .carousel-inner {
            border-radius: 8px 8px 0 0;
        }

        .event-card img {
            cursor: pointer;
            transition: transform 0.3s;
        }

        .event-card img:hover {
            transform: scale(1.05);
        }

        .event-card .card-body {
            padding: 1rem;
        }

        .event-card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #212529;
            padding: 0;
            margin: 0;
        }
        
        .event-card p {
            padding: 0;
            margin: 0;
            font-size: 0.95rem;
            color: #6c757d;
            line-height: 1.6;
            margin: 0;
        }
    </style>
@endpush

<div class="container" style="margin-top: 200px; margin-bottom: 200px">
    <p class="fw-bold text-center fs-2">
        Wahana
    </p>
    <p class="text-center fs-6 mb-5">
        {{ $master->desc_wahana }}
    </p>
    <div class="row d-flex justify-content-evenly gap-3">
        @forelse ($wisata as $item)
            <div class="col-lg-4">
                <div class="event-card">
                    <div id="carousel-2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" onclick="openPreviewEventOrGallery('{{ asset('storage/'.$item->path_1) }}')">
                                <img src="{{ asset('storage/'.$item->path_1) }}" style="width:100%; height:200px; object-fit:cover;" style="cursor:pointer"
                                   >
                            </div>
                            <div class="carousel-item" onclick="openPreviewEventOrGallery('{{ asset('storage/'.$item->path_2) }}')">
                                <img src="{{ asset('storage/'.$item->path_2) }}" style="width:100%; height:200px; object-fit:cover;" style="cursor:pointer"
                                   >
                            </div>
                            <div class="carousel-item" onclick="openPreviewEventOrGallery('{{ asset('storage/'.$item->path_3) }}')">
                                <img src="{{ asset('storage/'.$item->path_3) }}" style="width:100%; height:200px; object-fit:cover;" style="cursor:pointer"
                                    >
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-2" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">{{ $item->title }}</h3>
                        <p class="text-center mb-4"> {{ $item->desc }}</p>
                        <div class="row">
                            <div class="col-lg-6 mb-2 text-center">
                                <div class="fw-bold ">Weekday</div>
                                <div class="">{{ rupiah($item->price_weekday) }}</div>
                            </div>
                            <div class="col-lg-6 mb-2 text-center">
                                <div class="fw-bold ">Weekend</div>
                                <div class="">{{ rupiah($item->price_weekend) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center mx-auto">
                Tidak ada foto tersedia.
            </div>
        @endforelse
    </div>
</div>
<div class="modal fade modal-transparent" id="galleryOrEventPreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img id="previewImageGalleryOrEvent"
                             src=""
                             width="100%"
                             class="img-fluid rounded"
                             alt="">
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        function openPreviewEventOrGallery(image) {
            document.getElementById('previewImageGalleryOrEvent').src = image;

            const modalGallery = new bootstrap.Modal(
                document.getElementById('galleryOrEventPreviewModal')
            );
            modalGallery.show();
        }
    </script>
@endpush