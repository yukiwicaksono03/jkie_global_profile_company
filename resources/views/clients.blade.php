@extends('layouts.main')
@section('main')
<head>

<style>
.client-card{
    border:1px solid #eee;
    padding:25px;
    background:#fff;
    transition:0.3s;
    transform:translateY(-5px);
    box-shadow:0 10px 20px rgba(0,0,0,0.08);
}

.client-card img{
    max-height:60px;
    object-fit:contain;
    filter:grayscale(100%);
    transition:0.3s;
    filter:grayscale(0%);

}

</style>

</head>


<section class="py-5 bg-light-new">
<div class="container">

<div class="text-center mb-5">
<h2 class="fw-bold">{{ __('kamus.our_clients') }}</h2>
<p class="text-muted">
{{ __('kamus.trusted_by') }}
</p>
</div>

<div class="row g-4">


    <div class="row d-flex justify-content-center gap-3 align-items-stretch">
            <div class="p-2 col-lg-3 mb-4">
                <div class="card" style="cursor:pointer"
                    onclick="window.location.href='{{ route('menu_detail_by_client',1) }}'" >
                    <img src="{{ asset('public/images/default_client.jpeg') }}"
                            class="rounded"
                            style="width:100%; height:100%; object-fit:cover;"
                            alt="Clients for Overseas Project" >


                    <div class="p-3 mt-1">
                        <p class="fs-5 text-center ">Clients for Overseas Project</p>
                        <p class="fs-6 text-center fw-bold">
                            {{ __('kamus.read_more') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-2 col-lg-3 mb-4">
                <div class="card" style="cursor:pointer"
                    onclick="window.location.href='{{ route('menu_detail_by_client',2) }}'" >
                    <img src="{{ asset('public/images/default_client.jpeg') }}"
                            class="rounded"
                            style="width:100%; height:100%; object-fit:cover;"
                            alt="Clients for Indonesia Project and Overseas Project" >


                    <div class="p-3 mt-1">
                        <p class="fs-5 text-center ">Clients for Indonesia Project and Overseas Project</p>
                        <p class="fs-6 text-center fw-bold">
                            {{ __('kamus.read_more') }}
                        </p>
                    </div>
                </div>
            </div>
    </div>

</div>
</div>
</section>
@endsection