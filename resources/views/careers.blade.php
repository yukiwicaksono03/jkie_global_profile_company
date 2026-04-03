@extends('layouts.main')
@section('main')
<section class="py-5 bg-light-new">
<div class="container">

<div class="text-center mb-5">
<h2 class="fw-bold">{{ __('kamus.join_our') }}</h2>
<p class="text-muted">{{ __('kamus.we_are') }}</p>
</div>

<div class="row g-4">

@foreach ($menu as $item)
<div class="col-md-6">
<div class="card h-100 shadow-sm">
<div class="card-body">
<h5 class="card-title">{{ $item->name}}</h5>

{!! $item->desc !!}


<button onclick="sendEmail()" class="btn btn-primary btn-sm">{{ __('kamus.apply_now') }}</button>

<script>
function sendEmail() {
    window.location.href = `mailto:{{ $master->email }}
    ?subject=Job Application Submission
    &body=Dear Hiring Team,%0D%0A%0D%0A
I hope this message finds you well.%0D%0A%0D%0A
I am writing to express my interest in joining your organization and to submit my application for available opportunities at JKIGlobal.%0D%0A%0D%0A
%0D%0A%0D%0A
[Your skills and interest here]%0D%0A%0D%0A
%0D%0A%0D%0A
Please find my attached resume for your consideration.%0D%0A%0D%0A
Thank you for your time and consideration.%0D%0A%0D%0A
Sincerely,%0D%0A
[Your Name]%0D%0A
[Your Phone]%0D%0A
[Your Email]`;
}
</script>

</div>
</div>
</div>
@endforeach

</div>
</div>
</section>
@endsection