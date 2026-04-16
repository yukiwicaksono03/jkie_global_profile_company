@extends('layouts.main')
@section('main')
@php
$flag = request('flag');
$title = '';
if($flag == 1){
    $title = 'Clients for Overseas Project';
}elseif($flag == 2){
    $title = 'Clients for Indonesia Project and Overseas Project';
}
@endphp
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
<h2 class="fw-bold">{{ $title }}</h2>
<p class="text-muted">
{{ __('kamus.trusted_by') }}
</p>
</div>

<div class="row g-4">

@foreach ($menu as $item)
<div class="col-6 col-md-3">
<div class="client-card text-center">
<img src="{{ asset('storage/app/public/'.$item->path_1) }}" class="img-fluid" alt="{{$item->name}}">
</div>
</div>
@endforeach

</div>
</div>
</section>
@endsection