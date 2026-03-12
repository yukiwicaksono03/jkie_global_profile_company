@push('style')
    <style>
    .hero-wrapper {
        position: relative;
        height: 100vh;
        overflow: hidden;
    }
    #bgSlider,
        .carousel-inner,
        .carousel-item {
        height: 100vh;
    }

    .bg-slide {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .hero-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        
        display: flex;
        align-items: center;
        
        z-index: 10;
    }

    .hero-wrapper::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.3);
        z-index: 5;
    }
    </style>
@endpush
<div class="hero-wrapper">

    <div id="bgSlider"
        class="carousel slide"
        data-bs-ride="carousel"
        data-bs-interval="{{ $master->slider_delay }}">

        <div class="carousel-inner">
            @foreach ($slider as $item)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }} bg-slide"
                    style="background-image: url('{{ asset('storage/'.$item->path) }}');">
                    <div class="w-100 h-100"></div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 d-flex flex-column mx-auto align-items-center justify-content-center text-center">
                    <p class="fs-4 fw-bold mb-2 text-light">
                        {{ $master->greating_home_1 }}
                    </p>
                    <p class="fs-1 fw-bold text-light" style="color:#184D2B">
                        {{ $master->greating_home_2 }}
                    </p>
                    <p class="fs-6 text-light">
                        {{ $master->greating_home_3 }}
                    </p>

                    <div class="d-flex gap-2">
                        <a href="/menu" class="btn btn-green">Core Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
