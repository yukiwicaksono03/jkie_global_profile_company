<div class="container" style="margin-top: 200px; margin-bottom: 200px">
    <p class="fw-bold text-center fs-2 mb-5">
        Jam Operational
    </p>
    <div class="row d-flex align-items-stretch justify-content-evenly gap-3">
        <div class="col-lg-5">
            <div class="card p-4 h-100">
                <i class="bi bi-cup-hot fs-1 mx-auto mb-2" style="color: #184D2B"></i>
                <p class="fw-bold text-center fs-4 mb-2">
                    Kedai
                </p>
                @foreach ($kedai as $item)
                    <p class="text-center fs-6 mb-2">
                        {{ ucfirst($item['start']) }}
                        @if($item['start'] !== $item['end'])
                            - {{ ucfirst($item['end']) }}
                        @endif
                        : {{ $item['value'] ?: 'Tutup' }}
                    </p>
                @endforeach
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card p-4 h-100">
                <i class="bi bi-speedometer2 fs-1 mx-auto mb-2" style="color: #184D2B"></i>
                <p class="fw-bold text-center fs-4 mb-2">
                    Wahana
                </p>

                @foreach ($wahana as $item)
                    <p class="text-center fs-6 mb-2">
                        {{ ucfirst($item['start']) }}
                        @if($item['start'] !== $item['end'])
                            - {{ ucfirst($item['end']) }}
                        @endif
                        : {{ $item['value'] ?: 'Tutup' }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</div>