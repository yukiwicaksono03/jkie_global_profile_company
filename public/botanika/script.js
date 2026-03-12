document.addEventListener('DOMContentLoaded', function() {
    
    // Inisialisasi AOS
    AOS.init();

    // =========================================================
    // --- LOGIKA HEADER SCROLL (Ubah Warna & Logo) ---
    // =========================================================

    const navbar = document.querySelector('.navbar');
    const logoImage = document.querySelector('.navbar-brand img');
    
    // PERHATIAN: Path gambar logo dari input pengguna
    const logoGreen = 'img/botanika_white.png'; 
    const logoWhite = 'img/botanika_white.png'; 

    // Tentukan apakah ini halaman Home (index.html, atau root path /)
    const isHomePage = window.location.pathname.endsWith('index.html') || 
                       window.location.pathname.endsWith('about.html')||
                       window.location.pathname.endsWith('menu.html')||
                       window.location.pathname.endsWith('event.html')||
                       window.location.pathname.endsWith('store.html')||
                       window.location.pathname.endsWith('contact.html'); 

    
    // =========================================================
    // 1. SETTING STATUS NAV BAR PADA SAAT HALAMAN DIMUAT (INITIAL LOAD STATE)
    // Ini dieksekusi sekali dan mengatur warna default.
    // =========================================================

    if (!isHomePage) {
        // FIX KRITIS: Di Halaman Lain (about, menu, dll.): 
        // Paksa tampilan menjadi solid hijau sejak awal.
        navbar.classList.add('scrolled'); 
        if (logoImage) logoImage.src = logoWhite; 
    } else {
        // Di Home Page: Lakukan cek scroll saat ini (biasanya 0)
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
            if (logoImage) logoImage.src = logoWhite;
        } else {
            navbar.classList.remove('scrolled');
            if (logoImage) logoImage.src = logoGreen;
        }
    }


    // =========================================================
    // 2. LOGIKA SCROLL (Hanya aktifkan perubahan di Home Page)
    // =========================================================

    const handleScroll = () => {
        if (isHomePage) {
            if (window.scrollY > 50) {
                // Home page: SCROLLED state (Green)
                navbar.classList.add('scrolled');
                if (logoImage) logoImage.src = logoWhite;
            } else {
                // Home page: TOP state (Transparent)
                navbar.classList.remove('scrolled');
                if (logoImage) logoImage.src = logoGreen;
            }
        }
        // Jika bukan Home Page, scroll event tidak mengubah apa-apa
    };

    // Panggil event listener untuk scroll
    window.addEventListener('scroll', handleScroll);
    
    
    // =========================================================
    // --- LOGIKA FILTER MENU ---
    // =========================================================
    
    const menuFilterInputs = document.querySelectorAll('#menu input[name="menuFilter"]');

    if (menuFilterInputs.length > 0) {
        const defaultFilter = document.getElementById('food'); 
        if (defaultFilter && !document.querySelector('#menu input[name="menuFilter"]:checked')) {
            defaultFilter.checked = true;
        }

        menuFilterInputs.forEach(input => {
            input.addEventListener('change', () => {
                AOS.refresh();
            });
        });
    }

});