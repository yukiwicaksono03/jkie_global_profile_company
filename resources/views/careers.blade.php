@extends('layouts.main')
@section('main')
<section class="py-5 bg-light-new">
<div class="container">

<div class="text-center mb-5">
<h2 class="fw-bold">{{ __('kamus.join_our') }}</h2>
<p class="text-muted">{{ __('kamus.we_are') }}</p>
</div>

<div class="row g-4">

<!-- Commercial Specialist -->
<div class="col-md-6">
<div class="card h-100 shadow-sm">
<div class="card-body">
<h5 class="card-title">Commercial Specialist</h5>
<p class="text-muted small">Department: Commercial</p>

<ul class="small text-muted">
<li>Support bid and tender preparation</li>
<li>Manage contracts and RFQs</li>
<li>Coordinate with internal and external stakeholders</li>
<li>Assist commercial operations</li>
</ul>

<button class="btn btn-primary btn-sm">{{ __('kamus.apply_now') }}</button>
</div>
</div>
</div>

<!-- Commercial Analyst -->
<div class="col-md-6">
<div class="card h-100 shadow-sm">
<div class="card-body">
<h5 class="card-title">Commercial Analyst</h5>
<p class="text-muted small">Department: Commercial</p>

<ul class="small text-muted">
<li>Support commercial strategy</li>
<li>Assist tender and bidding process</li>
<li>Review contracts and agreements</li>
<li>Maintain client and vendor records</li>
</ul>

<button class="btn btn-primary btn-sm">{{ __('kamus.apply_now') }}</button>
</div>
</div>
</div>

<!-- Head of IT -->
<div class="col-md-6">
<div class="card h-100 shadow-sm">
<div class="card-body">
<h5 class="card-title">Head of IT & Digital Enablement</h5>
<p class="text-muted small">Department: IT</p>

<ul class="small text-muted">
<li>Lead IT infrastructure and governance</li>
<li>Manage cybersecurity and cloud systems</li>
<li>Oversee IT vendors and services</li>
<li>Drive digital transformation initiatives</li>
</ul>

<button class="btn btn-primary btn-sm">{{ __('kamus.apply_now') }}</button>
</div>
</div>
</div>

<!-- Invoice Processing Specialist -->
<div class="col-md-6">
<div class="card h-100 shadow-sm">
<div class="card-body">
<h5 class="card-title">Invoice Processing Specialist</h5>
<p class="text-muted small">Department: Finance</p>

<ul class="small text-muted">
<li>Manage invoice processing operations</li>
<li>Ensure financial accuracy and compliance</li>
<li>Support accounting administration</li>
<li>Coordinate with finance teams globally</li>
</ul>

<button class="btn btn-primary btn-sm">{{ __('kamus.apply_now') }}</button>
</div>
</div>
</div>

<!-- Government Relations Officer -->
<div class="col-md-6">
<div class="card h-100 shadow-sm">
<div class="card-body">
<h5 class="card-title">Government Relations Officer</h5>
<p class="text-muted small">Department: Administration</p>

<ul class="small text-muted">
<li>Coordinate with government authorities</li>
<li>Handle visa and labor documentation</li>
<li>Ensure regulatory compliance</li>
<li>Maintain official records and reports</li>
</ul>

<button class="btn btn-primary btn-sm">{{ __('kamus.apply_now') }}</button>
</div>
</div>
</div>

<!-- Technical Inspector -->
<div class="col-md-6">
<div class="card h-100 shadow-sm">
<div class="card-body">
<h5 class="card-title">QC / Technical Inspector</h5>
<p class="text-muted small">Department: Inspection</p>

<ul class="small text-muted">
<li>Perform vendor inspections</li>
<li>Ensure equipment quality compliance</li>
<li>Prepare inspection reports</li>
<li>Work with engineering and project teams</li>
</ul>

<button class="btn btn-primary btn-sm">{{ __('kamus.apply_now') }}</button>
</div>
</div>
</div>

</div>
</div>
</section>
@endsection