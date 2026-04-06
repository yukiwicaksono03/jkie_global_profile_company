@extends('layouts.main')
@section('main')
<head>

<style>

.contact-info{
    background:#f8f9fa;
    border-radius:10px;
    padding:30px;
}

.contact-item{
    margin-bottom:20px;
}

.map-container iframe{
    width:100%;
    height:350px;
    border:0;
    border-radius:10px;
}

</style>

</head>
<body>

<section class="py-5 bg-light-new">
<div class="container">


<div class="text-center mb-5">
<h2 class="fw-bold">{{ __('kamus.contact_us') }}</h2>
<p class="text-muted">{{ __('kamus.get_in') }}</p>
</div>

<div class="row g-4">

<!-- Contact Information -->
<div class="col-lg-5">
<div class="contact-info">

<h5 class="mb-4">{{ __('kamus.company_information') }}</h5>

<div class="contact-item">
<strong>{{ __('kamus.address') }}</strong>
<p class="mb-0">
{{ $master->alamat }}
</p>
</div>

<div class="contact-item">
<strong>{{ __('kamus.phone') }}</strong>
<p class="mb-0">{{ $master->whatsapp }}</p>
</div>

<div class="contact-item">
<strong>{{ __('kamus.email') }}</strong>
<p class="mb-0">{{ $master->email }}</p>
<p class="mb-0">{{ $master->email_2 }}</p>
<p class="mb-0">{{ $master->email_3 }}</p>
</div>

<!-- <div class="contact-item">
<strong>Working Hours</strong>
<p class="mb-0">
Monday – Friday <br>
08:00 AM – 05:00 PM
</p>
</div> -->

</div>
</div>

<!-- Contact Form -->
<div class="col-lg-7">

<form>

<div class="row g-3">

<div class="col-md-6">
<label class="form-label">{{ __('kamus.full_name') }}</label>
<input type="text" class="form-control" placeholder="{{ __('kamus.your_name') }}">
</div>

<div class="col-md-6">
<label class="form-label">{{ __('kamus.email_address') }}</label>
<input type="email" class="form-control" placeholder="{{ __('kamus.your_email') }}">
</div>

<div class="col-12">
<label class="form-label">{{ __('kamus.subject') }}</label>
<input type="text" class="form-control" placeholder="{{ __('kamus.subject') }}">
</div>

<div class="col-12">
<label class="form-label">{{ __('kamus.message') }}</label>
<textarea class="form-control" rows="5" placeholder="{{ __('kamus.write_your') }}"></textarea>
</div>

<div class="col-12">
<button type="submit" class="btn btn-primary px-4">
{{ __('kamus.send_message') }}
</button>
</div>

</div>

</form>

</div>

</div>

</div>
</section>


<!-- Google Maps -->
<section class="pb-5 bg-light-new">
<div class="container">

<div class="map-container">

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3965.7920955421423!2d106.7816851!3d-6.2910338!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1dac79851df%3A0x3e1666b3f2a3e5a8!2sPlaza%20Aminta!5e0!3m2!1sid!2sid!4v1774526482371!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>

</div>
</section>
@endsection