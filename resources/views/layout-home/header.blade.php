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

