<div class="container" style="margin-top: 200px; margin-bottom: 200px">
    <p class="fw-bold text-center fs-2 mb-3">
        Event Botanika
    </p>
    <p class="text-center fs-6 mb-5">
        {{ $master->desc_event_home }}
    </p>
    <div class="row">
        @forelse ($event as $item)
            <div class="col-lg-4 mb-4">
                <div class="card" style="cursor:pointer"
                    onclick="openPreviewEventOrGallery(
                        '{{ asset('storage/'.$item->photo) }}'
                    )" >
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('storage/'.$item->photo) }}"
                            class="rounded"
                            style="width:100%; height:100%; object-fit:cover;"
                            alt="foto menu" >
                    </div>
                    <div class="p-3 mt-1">
                        <p class="fs-5 text-center fw-bold">{{ $item->name }}</p>
                        <p class="fs-6 text-center">
                            {{ $item->desc }}
                        </p>
                        <p class="fs-6 text-center fw-bold">
                            {{ format_date($item->date) }}, {{ format_time($item->start_time) }} - {{ $item->end_time ? format_time($item->end_time) : 's/d selesai' }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                Tidak ada event tersedia.
            </div>
        @endforelse
    </div>
</div>

