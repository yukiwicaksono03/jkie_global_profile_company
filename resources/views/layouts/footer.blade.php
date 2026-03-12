<nav class="footer px-5 py-3" style="background:#212529; color: white">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <p class="fs-5 fw-bold">
                    {{ $master->title_footer }}
                </p>
                <p class="fs-6">
                    {{ $master->desc }}
                </p>
                <p class="fs-6">
                    Head Office : <br>
                    Jl. Gebang Mas 1, B3 No 37B, Cakung, Jakarta Timur
                </p>
                <p class="fs-6 mt-3">
                    2026 &copy; Berma
                </p>
            </div>
            <div class="col-lg-6">
                <p class="fs-6">
                    Contact Center
                </p>
                <p class="fs-6">
                    <a target="_blank" href="{{ $master->link_maps }}" class="text-white text-decoration-none">
                        <i class="fas fa-map-marker-alt me-2"></i>  {{ $master->alamat }}
                    </a>
                </p>
                <p class="fs-6">
                    <a target="_blank" href="mailto:someone@example.com" class="text-white text-decoration-none">
                        <i class="fa fa-envelope"></i>&nbsp; bermayuniar@bermayuniar.com
                    </a>
                    <br>
                    <a target="_blank" href="mailto:someone@example.com" class="text-white text-decoration-none">
                        <i class="fa fa-envelope"></i>&nbsp; yoga.yuniarto@bermayuniar.com
                    </a>
                    <br>
                    <a target="_blank" href="mailto:someone@example.com" class="text-white text-decoration-none">
                        <i class="fa fa-envelope"></i>&nbsp; marina.d@bermayuniar.com
                    </a>

                </p>
            </div>
        </div>
    </div>
</nav>