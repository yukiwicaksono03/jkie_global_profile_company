<div class="container" style="margin-top: 200px; margin-bottom: 200px">
    <p class="fw-bold text-center fs-2">
        Fasilitas
    </p>
    <p class="text-center fs-6 mb-5">
        {{ $master->desc_facilities }}
    </p>
    <div class="row g-3 px-2 d-flex justify-content-center">
        @forelse ($facilities as $facility)
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card p-4 w-100">
                    <p class="fw-bold text-center fs-4 mb-4">
                        {{ $facility->name }}
                    </p>
                    <p class="text-center fs-6 mb-2">
                        {{ $facility->desc }}
                    </p>
                </div>
            </div>
        @empty
            <div class="text-center mx-auto">
                Tidak ada foto tersedia.
            </div>
        @endforelse
    </div>
</div>