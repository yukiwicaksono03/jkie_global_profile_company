@push('style')
    <style>
        .slider-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            position: relative;
            padding: 60px 80px;
        }

        .slider-header {
            text-align: center;
            margin-bottom: 10px;
            color: black;
        }

        .slider-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .slider-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .slider-wrapper {
            overflow: hidden;
            border-radius: 20px;
            position: relative;
            perspective: 1000px;
        }

        .slider-track {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .slide-item {
            min-width: calc(33.333% - 20px);
            margin: 0 10px;
            flex-shrink: 0;
            transition: all 0.4s ease;
        }

        .card {
            position: relative;
            height: 100%;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            transition: all 0.4s ease;
            transform-style: preserve-3d;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 1;
        }

        .card:hover {
            transform: translateY(-15px) rotateX(5deg) scale(1.05);
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        .card:hover::before {
            opacity: 1;
        }

        .card-img-top {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.4s ease;
            z-index: 2;
            color: white;
        }

        .card:hover .card-overlay {
            transform: translateY(0);
        }

        .card-overlay h5 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .card-overlay p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #667eea;
        }

        .slider-btn:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .slider-btn:active {
            transform: translateY(-50%) scale(0.95);
        }

        .slider-btn-prev {
            left: 10px;
        }

        .slider-btn-next {
            right: 10px;
        }

        .slider-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .indicator.active {
            background: rgba(0, 0, 0, 0.8);
            width: 40px;
            border-radius: 6px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
        }

        .indicator:hover {
            background: rgba(0, 0, 0, 0.5);
        }

        .autoplay-toggle {
            /* position: absolute;
            top: 20px;
            right: 20px; */
            margin-bottom: 10px;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(0, 0, 0, 0.3);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .autoplay-toggle:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: scale(1.05);
        }

        .progress-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            width: 0%;
            transition: width 0.1s linear;
            border-radius: 0 2px 2px 0;
        }

        @media (max-width: 992px) {
            .slide-item {
                min-width: calc(50% - 20px);
            }
        }

        @media (max-width: 576px) {
            .slide-item {
                min-width: calc(100% - 20px);
            }
            
            .slider-container {
                padding: 40px 60px;
            }

            .slider-header h2 {
                font-size: 1.8rem;
            }

            .slider-btn {
                width: 45px;
                height: 45px;
                font-size: 1rem;
            }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        .card.loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite;
        }
    </style>
@endpush
<div class="container" style="margin-top: 200px; margin-bottom: 200px">
    <div class="slider-container">
        <p class="fw-bold text-center fs-2 slider-header">
            Gallery Botanika
        </p>
        <p class="text-center mb-5 fs-6">
            {{ $master->desc_gallery }}
        </p>

        <button class="autoplay-toggle mx-auto" id="autoplayToggle">
            <i class="fas fa-pause"></i>
            <span>Auto Play</span>
        </button>

        <button class="slider-btn slider-btn-prev" id="prevBtn">
            <i class="fas fa-chevron-left"></i>
        </button>

        <div class="slider-wrapper">
            <div class="progress-bar" id="progressBar"></div>
            <div class="slider-track" id="sliderTrack">
                @forelse ($gallery as $item)
                    <div class="slide-item">
                        <div class="card" style="cursor:pointer"
                        onclick="openPreviewEventOrGallery(
                            '{{ asset('storage/'.$item->path) }}'
                        )">
                            <img src="{{ asset('storage/'.$item->path) }}" class="card-img-top" alt="">
                            <div class="card-overlay">
                                <h5>{{ $item->title }}</h5>
                                <p>{{ $item->desc }}</p>
                            </div>
                        </div>
                    </div>

                @empty
                <div class="text-center mx-auto">
                    Tidak ada foto tersedia.
                </div>
                @endforelse
            </div>
        </div>

        <button class="slider-btn slider-btn-next" id="nextBtn">
            <i class="fas fa-chevron-right"></i>
        </button>

        <div class="slider-indicators" id="indicators"></div>
    </div>
</div>
<div class="modal fade modal-transparent" id="galleryOrEventPreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img id="previewImageGalleryOrEvent"
                             src=""
                             width="100%"
                             class="img-fluid rounded"
                             alt="">
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        function openPreviewEventOrGallery(image) {
            document.getElementById('previewImageGalleryOrEvent').src = image;

            const modalGallery = new bootstrap.Modal(
                document.getElementById('galleryOrEventPreviewModal')
            );
            modalGallery.show();
        }

        const track = document.getElementById('sliderTrack');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const slides = document.querySelectorAll('.slide-item');
        const indicatorsContainer = document.getElementById('indicators');
        const autoplayToggle = document.getElementById('autoplayToggle');
        const progressBar = document.getElementById('progressBar');
        
        let currentIndex = 0;
        let itemsPerPage = 3;
        let autoplayInterval = null;
        let isAutoplayActive = true;
        let progressInterval = null;
        let progress = 0;

        // Create indicators
        function createIndicators() {
            indicatorsContainer.innerHTML = '';
            const totalPages = Math.ceil(slides.length / itemsPerPage);
            for (let i = 0; i < totalPages; i++) {
                const indicator = document.createElement('div');
                indicator.classList.add('indicator');
                if (i === 0) indicator.classList.add('active');
                indicator.addEventListener('click', () => goToSlide(i * itemsPerPage));
                indicatorsContainer.appendChild(indicator);
            }
        }

        function updateItemsPerPage() {
            if (window.innerWidth <= 576) {
                itemsPerPage = 1;
            } else if (window.innerWidth <= 992) {
                itemsPerPage = 2;
            } else {
                itemsPerPage = 3;
            }
            createIndicators();
        }

        function updateSlider() {
            const slideWidth = slides[0].offsetWidth + 20;
            track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            updateIndicators();
        }

        function updateIndicators() {
            const indicators = document.querySelectorAll('.indicator');
            const currentPage = Math.floor(currentIndex / itemsPerPage);
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentPage);
            });
        }

        function goToSlide(index) {
            currentIndex = Math.max(0, Math.min(index, slides.length - itemsPerPage));
            updateSlider();
            resetProgress();
        }

        function nextSlide() {
            if (currentIndex < slides.length - itemsPerPage) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            updateSlider();
            resetProgress();
        }

        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = slides.length - itemsPerPage;
            }
            updateSlider();
            resetProgress();
        }

        function startAutoplay() {
            if (autoplayInterval) return;
            
            autoplayInterval = setInterval(nextSlide, 2000);
            startProgress();
            
            const icon = autoplayToggle.querySelector('i');
            icon.classList.remove('fa-play');
            icon.classList.add('fa-pause');
        }

        function stopAutoplay() {
            if (autoplayInterval) {
                clearInterval(autoplayInterval);
                autoplayInterval = null;
            }
            stopProgress();
            
            const icon = autoplayToggle.querySelector('i');
            icon.classList.remove('fa-pause');
            icon.classList.add('fa-play');
        }

        function startProgress() {
            progress = 0;
            progressBar.style.width = '0%';
            
            progressInterval = setInterval(() => {
                progress += 0.25;
                progressBar.style.width = progress + '%';
                
                if (progress >= 100) {
                    progress = 0;
                }
            }, 10);
        }

        function stopProgress() {
            if (progressInterval) {
                clearInterval(progressInterval);
                progressInterval = null;
            }
            progressBar.style.width = '0%';
        }

        function resetProgress() {
            if (isAutoplayActive) {
                stopProgress();
                startProgress();
            }
        }

        autoplayToggle.addEventListener('click', () => {
            isAutoplayActive = !isAutoplayActive;
            if (isAutoplayActive) {
                startAutoplay();
            } else {
                stopAutoplay();
            }
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
        });

        nextBtn.addEventListener('click', () => {
            nextSlide();
        });

        window.addEventListener('resize', () => {
            updateItemsPerPage();
            currentIndex = Math.min(currentIndex, slides.length - itemsPerPage);
            updateSlider();
        });

        // Pause on hover
        track.addEventListener('mouseenter', () => {
            if (isAutoplayActive) {
                stopAutoplay();
            }
        });

        track.addEventListener('mouseleave', () => {
            if (isAutoplayActive) {
                startAutoplay();
            }
        });

        // Initialize
        updateItemsPerPage();
        updateSlider();
        startAutoplay();
    
    </script>
@endpush

