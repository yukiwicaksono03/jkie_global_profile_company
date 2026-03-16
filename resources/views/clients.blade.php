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


<section class="py-5 bg-light">
<div class="container">

<div class="text-center mb-5">
<h2 class="fw-bold">Our Clients</h2>
<p class="text-muted">
Trusted by companies from various industries
</p>
</div>

<div class="row g-4">

<!-- Client 1 -->
<div class="col-6 col-md-3">
<div class="client-card text-center">
<img src="images/clients/client1.png" class="img-fluid" alt="Client 1">
<p class="mt-3 mb-0 small fw-semibold">PT Nusantara Energi</p>
</div>
</div>

<!-- Client 2 -->
<div class="col-6 col-md-3">
<div class="client-card text-center">
<img src="images/clients/client2.png" class="img-fluid" alt="Client 2">
<p class="mt-3 mb-0 small fw-semibold">Global Tech Solutions</p>
</div>
</div>

<!-- Client 3 -->
<div class="col-6 col-md-3">
<div class="client-card text-center">
<img src="images/clients/client3.png" class="img-fluid" alt="Client 3">
<p class="mt-3 mb-0 small fw-semibold">Indo Manufacturing</p>
</div>
</div>

<!-- Client 4 -->
<div class="col-6 col-md-3">
<div class="client-card text-center">
<img src="images/clients/client4.png" class="img-fluid" alt="Client 4">
<p class="mt-3 mb-0 small fw-semibold">Sinar Logistics</p>
</div>
</div>

<!-- Client 5 -->
<div class="col-6 col-md-3">
<div class="client-card text-center">
<img src="images/clients/client5.png" class="img-fluid" alt="Client 5">
<p class="mt-3 mb-0 small fw-semibold">Pacific Engineering</p>
</div>
</div>

<!-- Client 6 -->
<div class="col-6 col-md-3">
<div class="client-card text-center">
<img src="images/clients/client6.png" class="img-fluid" alt="Client 6">
<p class="mt-3 mb-0 small fw-semibold">Metro Construction</p>
</div>
</div>

<!-- Client 7 -->
<div class="col-6 col-md-3">
<div class="client-card text-center">
<img src="images/clients/client7.png" class="img-fluid" alt="Client 7">
<p class="mt-3 mb-0 small fw-semibold">Asia Industrial Group</p>
</div>
</div>

<!-- Client 8 -->
<div class="col-6 col-md-3">
<div class="client-card text-center">
<img src="images/clients/client8.png" class="img-fluid" alt="Client 8">
<p class="mt-3 mb-0 small fw-semibold">Prime Infrastructure</p>
</div>
</div>

</div>
</div>
</section>
@endsection