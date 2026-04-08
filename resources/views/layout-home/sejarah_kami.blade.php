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

    <div class="row d-flex justify-content-center gap-3 align-items-stretch">
        @foreach ($menu as $item)
            <div class="p-2 col-lg-3 mb-4">
                <div class="card" style="cursor:pointer"
                    onclick="window.location.href='{{ route('menu_detail_by_folder',$item->id) }}'" >
                    <img src="{{ (($item->path_1) ? asset('storage/app/public/'.$item->path_1) : asset('public/images/default_pict.jpeg')) }}"
                            class="rounded"
                            style="width:100%; height:100%; object-fit:cover;"
                            alt="{{ $item->name }}" >


                    <div class="p-3 mt-1">
                        <p class="fs-5 text-center ">{{ $item->name }}</p>
                        <p class="fs-6 text-center fw-bold">
                            {{ __('kamus.read_more') }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

   </div>
</div>
</section>  