<style>
    .wa-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background-color: #25D366;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        cursor: pointer;
        animation: bounce 1.5s infinite;
        z-index: 999;
    }

    .wa-button img {
        width: 35px;
        height: 35px;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }

    .wa-button:hover {
        animation: none;
        transform: scale(1.1);
    }
</style>

<div class="wa-button" onclick="openWhatsApp()">
    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
</div>

<nav class="footer px-5 py-3" style="background:#080884; color: white">
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
                    {{ __('kamus.address') }} : {{ $master->alamat }}
                    <br>
                <div onclick="window.location.href='https://wa.me/62{{ $master->whatsapp }}'" style="cursor: pointer;">
                    <img src="{{ asset('public/images/logo_wa.png') }}" height="19">
                    <span>{{ $master->whatsapp }}</span>
                </div>
                </p>
                <p class="fs-6 mt-3">
                    2026 &copy; JK Inspection Engineering Co., Ltd
                </p>
            </div>
            <!-- <div class="col-lg-6">
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
            </div> -->
        </div>
    </div>
</nav>

<script>
function openWhatsApp() {
    let phone = "{{ $master->whatsapp }}";
    let message = "";

    let url = "https://wa.me/62" + phone + "?text=" + encodeURIComponent(message);

    window.open(url, "_blank");
}
</script>