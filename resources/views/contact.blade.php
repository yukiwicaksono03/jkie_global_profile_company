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

<section class="py-5">
<div class="container">

<div class="text-center mb-5">
<h2 class="fw-bold">Contact Us</h2>
<p class="text-muted">Get in touch with our team for inquiries and collaborations</p>
</div>

<div class="row g-4">

<!-- Contact Information -->
<div class="col-lg-4">
<div class="contact-info">

<h5 class="mb-4">Company Information</h5>

<div class="contact-item">
<strong>Address</strong>
<p class="mb-0">
Jl. Example Street No.123 <br>
Jakarta, DKI Jakarta <br>
Indonesia
</p>
</div>

<div class="contact-item">
<strong>Phone</strong>
<p class="mb-0">+62 812 3456 7890</p>
</div>

<div class="contact-item">
<strong>Email</strong>
<p class="mb-0">info@jkieglobal.com</p>
</div>

<div class="contact-item">
<strong>Working Hours</strong>
<p class="mb-0">
Monday – Friday <br>
08:00 AM – 05:00 PM
</p>
</div>

</div>
</div>

<!-- Contact Form -->
<div class="col-lg-8">

<form>

<div class="row g-3">

<div class="col-md-6">
<label class="form-label">Full Name</label>
<input type="text" class="form-control" placeholder="Your Name">
</div>

<div class="col-md-6">
<label class="form-label">Email Address</label>
<input type="email" class="form-control" placeholder="Your Email">
</div>

<div class="col-12">
<label class="form-label">Subject</label>
<input type="text" class="form-control" placeholder="Subject">
</div>

<div class="col-12">
<label class="form-label">Message</label>
<textarea class="form-control" rows="5" placeholder="Write your message"></textarea>
</div>

<div class="col-12">
<button type="submit" class="btn btn-primary px-4">
Send Message
</button>
</div>

</div>

</form>

</div>

</div>

</div>
</section>


<!-- Google Maps -->
<section class="pb-5">
<div class="container">

<div class="map-container">

<iframe 
src="https://maps.google.com/maps?q=jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed">
</iframe>

</div>

</div>
</section>
@endsection