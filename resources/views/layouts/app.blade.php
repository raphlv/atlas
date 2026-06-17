<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATLAS GEAR | Premium Mobile Gaming Accessories</title>
    <meta name="description" content="ATLAS GEAR - Official Store. Aksesoris mobile gaming premium dengan pendinginan es instan ARES V1/V2, sarung jempol carbon fiber Blizzard, dan earbuds gaming latensi rendah.">
    <!-- Google Fonts Outfit & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- Icy Background Flakes -->
    <div class="ice-dust-container" id="ice-dust"></div>

    <!-- Navigation Header -->
    <header class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="nav-brand">
                <div class="brand-logo">
                    <img src="{{ asset('images/logo.png') }}?v=1.0.2" alt="ATLAS Logo" style="width: 24px; height: 24px; object-fit: contain;">
                </div>
                <span class="brand-text">ATLAS <span class="highlight">GEAR</span></span>
            </a>
            
            <button class="nav-toggle" id="nav-toggle" aria-label="Toggle Navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            
            <nav class="nav-links" id="nav-links">
                <a href="{{ route('home') }}" class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('catalog') }}" class="{{ Route::currentRouteName() == 'catalog' ? 'active' : '' }}">Produk</a>
                <a href="{{ route('simulator') }}" class="{{ Route::currentRouteName() == 'simulator' ? 'active' : '' }}">Cooling Simulator</a>
                <a href="{{ route('warranty') }}" class="{{ Route::currentRouteName() == 'warranty' ? 'active' : '' }}">Garansi</a>
                <a href="https://www.instagram.com/atlasgearofficial" target="_blank" class="nav-ig">
                    <i class="fa-brands fa-instagram"></i> @atlasgearofficial
                </a>
            </nav>
        </div>
    </header>

    <!-- Content Area -->
    <main class="main-wrapper">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand-section">
                <a href="{{ route('home') }}" class="footer-logo">
                    <i class="fa-solid fa-snowflake"></i> ATLAS GEAR
                </a>
                <p class="footer-tagline">Freeze the Temperature, Dominate the Game.</p>
                <div class="social-icons">
                    <a href="https://www.instagram.com/atlasgearofficial" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://youtube.com" target="_blank" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
            
            <div class="footer-links-grid">
                <div class="footer-column">
                    <h4>Navigasi</h4>
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('catalog') }}">Produk</a>
                    <a href="{{ route('simulator') }}">Cooling Simulator</a>
                    <a href="{{ route('warranty') }}">Garansi</a>
                </div>
                <div class="footer-column">
                    <h4>Kategori</h4>
                    <a href="{{ route('catalog', ['category' => 'Cooler']) }}">Phone Coolers</a>
                    <a href="{{ route('catalog', ['category' => 'Sleeves']) }}">Thumb Sleeves</a>
                    <a href="{{ route('catalog', ['category' => 'Triggers']) }}">Gaming Triggers</a>
                    <a href="{{ route('catalog', ['category' => 'Earphones']) }}">Earphones</a>
                </div>
                <div class="footer-column">
                    <h4>Marketplace</h4>
                    <a href="https://shopee.co.id/tokoteknopro" target="_blank"><i class="fa-solid fa-bag-shopping"></i> Shopee Indonesia</a>
                    <a href="https://www.tokopedia.com/tokoteknopro" target="_blank"><i class="fa-solid fa-store"></i> Tokopedia</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} ATLAS GEAR. All Rights Reserved. Designed in premium Icy Aesthetics.</p>
        </div>
    </footer>

    <!-- App Script -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
