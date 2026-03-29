<section class="py-5 bg-light-new">
<div class="container" style="margin-top: 200px; margin-bottom: 200px">
   <div class="row d-flex justify-content-center">
        <div class="col-lg-11 d-flex flex-column justify-content-start">
            <!--<p class="fs-2 fw-bold">Who We Are</p>
            <p class="fs-6" style="font-size: 150% !important;">
                {{--{!! nl2br(e($master->sejarah)) !!}--}}
            </p> -->
            <p class="fs-2 fw-bold">{{ __('kamus.why_jkie') }}</p>
            <p class="fs-6" style="font-size: 150% !important;">
            {{ __('kamus.why_jkie_desc') }}
            </p>
            <p class="fs-2 fw-bold">{{ __('kamus.about_us') }}</p>
            <p class="fs-6" style="font-size: 150% !important;">
            {{ __('kamus.about_us_desc') }}
            </p>
            <p class="fs-2 fw-bold">{{ __('kamus.vision_mission') }}</p>
            <p class="fs-6" style="font-size: 150% !important;">

            <b>{{ __('kamus.vision') }}</b>
            <br>{{ __('kamus.vision_point') }}

            <br><b>{{ __('kamus.mission') }}</b>
            <ul class="fs-6" style="font-size: 150% !important;">
                <li>{{ __('kamus.mission_point_1') }}</li>
                <li>{{ __('kamus.mission_point_2') }}</li>
                <li>{{ __('kamus.mission_point_3') }}</li>
                <li>{{ __('kamus.mission_point_4') }}</li>
            </ul>
            </p>
            <p class="fs-2 fw-bold">ISO</p>
            <p class="fs-6" style="font-size: 150% !important;">
            {{ __('kamus.iso_desc') }}
            </p>
            <p class="fs-2 fw-bold">{{ __('kamus.photo_pictures_jkie') }}</p>
            <p class="fs-6" style="font-size: 150% !important;">
            {{ __('kamus.photo_pictures_jkie_desc') }}
            </p>
        </div>
        <br>
        <br>

        <div class="col-lg-6 mb-3">
            <img src="{{ asset('storage/app/public/'.$master->foto_sejarah_1) }}" class="w-100">
        </div>
        <div class="col-lg-6 mb-3">
            <img src="{{ asset('storage/app/public/'.$master->foto_sejarah_2) }}" class="w-100">
        </div>
        <div class="col-lg-6 mb-3">
            <img src="{{ asset('storage/app/public/'.$master->foto_sejarah_3) }}" class="w-100">
        </div>
        <div class="col-lg-6 mb-3">
            <img src="{{ asset('storage/app/public/'.$master->foto_sejarah_4) }}" class="w-100">
        </div>
   </div>
</div>
</section>  