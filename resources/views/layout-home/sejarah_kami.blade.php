<div class="container" style="margin-top: 200px; margin-bottom: 200px">
   <div class="row d-flex justify-content-center">
        <div class="col-lg-11 d-flex flex-column justify-content-start">
            <p class="fs-2 fw-bold">Who We Are</p>
            <p class="fs-6" style="font-size: 150% !important;">
                {!! nl2br(e($master->sejarah)) !!}
            </p>
        </div>
        <br>
        <br>

        <div class="col-lg-6 mb-3">
            <img src="{{ asset('storage/'.$master->foto_sejarah_1) }}" class="w-100">
        </div>
        <div class="col-lg-6 mb-3">
            <img src="{{ asset('storage/'.$master->foto_sejarah_2) }}" class="w-100">
        </div>
        <div class="col-lg-6 mb-3">
            <img src="{{ asset('storage/'.$master->foto_sejarah_3) }}" class="w-100">
        </div>
        <div class="col-lg-6 mb-3">
            <img src="{{ asset('storage/'.$master->foto_sejarah_4) }}" class="w-100">
        </div>
   </div>
</div>