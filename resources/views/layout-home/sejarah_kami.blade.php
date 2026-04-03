<section class="py-5 bg-light-new">
<div class="container">
   <div class="row d-flex justify-content-center">
        {!! $desc_who_we_are !!}

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

        @for ($i = 1; $i <= 10; $i++)
            @if(!empty($master->{'foto_card_'.$i}))
                <div class="col-lg-6 mb-3">
                    <img src="{{ asset('storage/app/public/' . $master->{'foto_card_'.$i}) }}" class="w-100">
                </div>
            @endif
        @endfor

   </div>
</div>
</section>  