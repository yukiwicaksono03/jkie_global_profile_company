@extends('layouts.main')
@section('main')
<head>

<style>
.client-card{
    border:1px solid #eee;
    padding:25px;
    background:#fff;
    transition:0.3s;
}

.client-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 20px rgba(0,0,0,0.08);
}

.client-card img{
    max-height:60px;
    object-fit:contain;
    filter:grayscale(100%);
    transition:0.3s;
}

.client-card:hover img{
    filter:grayscale(0%);
}


</style>

</head>


<section class="py-5 bg-light-new">
<div class="container">

<div class="text-center mb-5">
<h2 class="fw-bold">Our Clients</h2>
<p class="text-muted">
Trusted by companies from various industries
</p>
</div>

<div class="row g-4">

@foreach ($menu as $item)
<div class="col-6 col-md-3">
<div class="client-card text-center">
<img src="images/clients/client1.png" class="img-fluid" alt="Client 1">
<p class="mt-3 mb-0 small fw-semibold">PT Nusantara Energi</p>
</div>
</div>
@endforeach

</div>
</div>
</section>
@endsection