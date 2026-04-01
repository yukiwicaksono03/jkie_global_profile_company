<style type="text/css">
.navbar-glass{
    background: rgba(255,255,255,0.35);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

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

.hero-wrapper {
    position: relative;
    height: 100vh;
}

#bgSlider,
#bgSlider .carousel-inner,
#bgSlider .carousel-item {
    height: 100vh;
}

@media (max-width:768px){
    .hero-wrapper{
        height: 60vh;
    }

    #bgSlider,
    #bgSlider .carousel-inner,
    #bgSlider .carousel-item{
        height:60vh;
    }
}
.hero-video{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    object-fit:cover;
    z-index:1;
}

#muteBtn {
    position: absolute;
    bottom: 20px;
    right: 20px;
    z-index: 20;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light px-5 py-3 navbar-glass">

<div class="container-fluid">

    <!-- MOBILE LOGO (LEFT) -->
    <a class="navbar-brand d-lg-none" href="/">
        <img src="{{ asset('images/berma.png') }}" height="60">
    </a>

    <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

        <!-- LEFT MENU -->
        <ul class="navbar-nav fs-5">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">{{ __('kamus.WHO_ARE_WE') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('menu/1') ? 'active' : '' }}" href="/menu/1">{{ __('kamus.SERVICE_PRODUCTS') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('menu/2') ? 'active' : '' }}" href="/menu/2">{{ __('kamus.INSIGHTS') }}</a>
            </li>
        </ul>


        <!-- DESKTOP CENTER LOGO -->
        <a class="navbar-brand d-none d-lg-block text-center"
           href="/"
           style="margin-left: 0px; margin-top:-20px;margin-bottom:-20px;">
            <img src="{{ asset('public/images/jkie_logo.jpeg') }}" height="80">
        </a>


        <!-- RIGHT MENU -->
        <ul class="navbar-nav fs-5">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/clients') ? 'active' : '' }}" href="/menu/3">{{ __('kamus.CLIENTS') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('careers') ? 'active' : '' }}" href="/careers">{{ __('kamus.CAREERS') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">{{ __('kamus.CONTACT') }}</a>
            </li>
            <li>
                <div style="margin-top: 6px; margin-left: 20px;">
                    <a href="/lang/en"><img src="{{ asset('public/images/en.png') }}" width="20"></a>&nbsp;
                    <a href="/lang/id"><img src="{{ asset('public/images/id.png') }}" width="20"></a>&nbsp;
                    <a href="/lang/ko"><img src="{{ asset('public/images/ko.png') }}" width="20"></a>
                </div>
            </li>
        </ul>
    </div>

</div>
</nav>
<div class="hero-wrapper">
    <div id="bgSlider"
        class="carousel slide"
        data-bs-ride="carousel"
        data-bs-interval="{{ $master->slider_delay }}">
        <div class="carousel-inner">

            <video autoplay loop playsinline class="hero-video" id="myVideo">
                <source src="{{ asset('storage/app/public/'.$slider->path) }}" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="hero-content">
        <div class="container" style="display:none !important">
            <div class="row align-items-center">
                <div class="col-lg-7 d-flex flex-column mx-auto align-items-center justify-content-center text-center">
                    <p class="fs-4 fw-bold mb-2 text-light">
                        {{ __('kamus.welcome') }}
                    </p>
                    <p class="fs-1 fw-bold text-light" style="color:#184D2B">
                        {{ $master->greating_home_2 }}
                    </p>
                    <p class="fs-6 text-light">
                        {{ __('kamus.description') }}
                    </p>

                    <div class="d-flex gap-2">
                        <a href="/contact" class="btn btn-blue">{{ __('kamus.contact_us') }}</a>
                        <a href="/careers" class="btn btn-blue">{{ __('kamus.join_team') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-blue" id="muteBtn">{{ __('kamus.mute') }} 🔇</button>

    </div>

</div>
<script>
    const video = document.getElementById('myVideo');
    const button = document.getElementById('muteBtn');
    video.muted;
    button.addEventListener('click', () => {
        video.muted = !video.muted;

        // Change button text
        button.textContent = video.muted ? '{{ __("kamus.unmute") }} 🔊' : '{{ __("kamus.mute") }} 🔇';
    });
</script>