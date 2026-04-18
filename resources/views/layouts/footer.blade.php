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


<style type="text/css">
.footer {
  background: linear-gradient(to right, #1c1f26, #2b2f38);
  color: #ccc;
  padding: 50px;
  font-family: Arial, sans-serif;
}

.footer-container {
  display: flex;
  gap: 80px;
  flex-wrap: wrap;
}

.footer-col h3 {
  color: #fff;
  margin-bottom: 20px;
  font-size: 18px;
}

.footer-item {
  margin-bottom: 15px;
  cursor: pointer;
  color: #f1c40f;
  font-weight: bold;
}

.footer-item .arrow {
  margin-right: 8px;
}

.footer-detail {
  color: #bbb;
  font-weight: normal;
  margin-top: 8px;
  margin-left: 20px;
  line-height: 1.6;
  display: none;
}

.footer-item.active .footer-detail {
  display: block;
}
</style>

<div class="" style="margin: 20px;">
  <div class="footer-container">

    <!-- Asia Pacific -->
    <div class="footer-col">
      <h3>Asia Pacific</h3>

      <div class="footer-item">
        <span class="arrow">▼</span> Korea (HQ)
        <div class="footer-detail">
          JK Inspection Engineering Co., Ltd.<br>
          459-14, Gasan-Dong, GeumCheon-Gu, Seoul, Korea<br>
          (Hyundai Tera Tower Gasan DK, #619)<br>
          (Zip Code: 08503)
        </div>
      </div>

      <div class="footer-item">
        <span class="arrow">▶</span> Indonesia
        <div class="footer-detail">
          PT JKIE Global Indonesia<br>
          PLAZA AMINTA 2ND FLOOR, SUITE 208<br>
          JALAN TB SIMATUPANG KAV. 10<br>
          SOUTH JAKARTA, DKI JAKARTA
        </div>
      </div>

      <div class="footer-item">
        <span class="arrow">▶</span> China
        <div class="footer-detail">
          JK China Suzhou Office
        </div>
      </div>
    </div>

    <!-- Europe & Russia -->
    <div class="footer-col">
      <h3>Europe & Russia</h3>

      <div class="footer-item">
        <span class="arrow">▶</span> Russia
        <div class="footer-detail">
          JK Inspection Engineering Co., Ltd.<br>
          Office 105, Novoslabodskaya Ulitsa 58<br>
          Moscow, Russia
        </div>
      </div>
    </div>

  </div>
</div>

<script>
  document.querySelectorAll('.footer-item').forEach(item => {
    item.addEventListener('click', () => {
      item.classList.toggle('active');

      const arrow = item.querySelector('.arrow');
      arrow.textContent = item.classList.contains('active') ? '▼' : '▶';
    });
  });
</script>



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