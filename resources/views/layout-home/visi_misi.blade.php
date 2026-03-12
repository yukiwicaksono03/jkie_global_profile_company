<div class="container" style="margin-top: 200px; margin-bottom: 200px">
    <p class="fw-bold text-center fs-2 mb-5">
        Our Vision & Mission
    </p>
    <div class="row d-flex justify-content-evenly gap-3 align-items-stretch px-2">
        <div class="col-lg-5 card p-4">
            <p class="fw-bold text-center fs-4 mb-2">
                Visi
            </p>
            <p class="text-center fs-6 mb-2">
                {!! nl2br(e($master->visi)) !!}
            </p>
        </div>
        <div class="col-lg-5 card p-4">
            <p class="fw-bold text-center fs-4 mb-2">
                Misi
            </p>
            <p class="text-center fs-6 mb-2">
                {!! nl2br(e($master->misi)) !!}
            </p>
        </div>
    </div>
</div>