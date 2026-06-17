@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fa-solid fa-bolt"></i> Mobile Gaming Gear Terdingin
            </div>
            <h1>
                Bermain Lebih Dingin <br>
                <span class="gradient-text">Mencapai Performa Maksimal</span>
            </h1>
            <p>
                ATLAS GEAR menghadirkan lini aksesoris mobile gaming premium dengan teknologi pendinginan semikonduktor canggih. Katakan selamat tinggal pada overheat, lag, dan keringat jari!
            </p>
            <div class="hero-actions">
                <a href="{{ route('catalog') }}" class="btn btn-primary">Lihat Katalog</a>
                <a href="{{ route('simulator') }}" class="btn btn-secondary">Uji Simulator</a>
            </div>
        </div>
        <div class="hero-image-side">
            <div class="hero-image-glow"></div>
            <!-- Since we don't have local physical files yet, we use a beautifully stylized SVG badge for the hero representation -->
            <svg class="hero-device-mockup" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="250" cy="250" r="180" fill="url(#hero-gradient)" stroke="#00d8f6" stroke-width="4" stroke-dasharray="10 5" />
                <path d="M250 140 L330 320 L170 320 Z" fill="#00d8f6" opacity="0.1" />
                <circle cx="250" cy="250" r="100" fill="#060b1e" stroke="#00d8f6" stroke-width="8" />
                <!-- Fan Blades -->
                <path d="M250 250 L250 170" stroke="#00d8f6" stroke-width="12" stroke-linecap="round" />
                <path d="M250 250 L319 290" stroke="#00d8f6" stroke-width="12" stroke-linecap="round" />
                <path d="M250 250 L181 290" stroke="#00d8f6" stroke-width="12" stroke-linecap="round" />
                <circle cx="250" cy="250" r="25" fill="#ffffff" />
                <path d="M235 250 L265 250 M250 235 L250 265" stroke="#09122c" stroke-width="4" />
                <defs>
                    <radialGradient id="hero-gradient" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(250 250) rotate(90) scale(180)">
                        <stop stop-color="#0d224b" />
                        <stop offset="1" stop-color="#030611" />
                    </radialGradient>
                </defs>
            </svg>
        </div>
    </div>
</section>

<!-- Features section -->
<section class="features-section">
    <div class="section-title-center">
        <h2>Keunggulan <span class="highlight">ATLAS Tech</span></h2>
        <p>Mengapa pro player dan gamers kompetitif memilih aksesoris gaming dari ATLAS.</p>
    </div>
    <div class="features-grid">
        <div class="feature-box glass-card">
            <div class="feature-icon-wrapper">
                <i class="fa-solid fa-snowflake"></i>
            </div>
            <h3>Pendinginan Semikonduktor</h3>
            <p>Teknologi pendingin thermoelectric aktif (TEC) menurunkan suhu smartphone hingga 0°C untuk mencegah throttling.</p>
        </div>
        <div class="feature-box glass-card">
            <div class="feature-icon-wrapper">
                <i class="fa-solid fa-fingerprint"></i>
            </div>
            <h3>Sensitivitas Maksimal</h3>
            <p>Thumb sleeve rajutan serat karbon premium menjamin drag-shoot 100% akurat tanpa gesekan kasar di layar.</p>
        </div>
        <div class="feature-box glass-card">
            <div class="feature-icon-wrapper">
                <i class="fa-solid fa-bolt"></i>
            </div>
            <h3>Latensi Ultra Rendah</h3>
            <p>Konektivitas Bluetooth audio latensi ultra-rendah 40ms menyelaraskan suara langkah kaki secara sinkron instan.</p>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="products-section">
    <div class="section-title-center">
        <h2>Aksesoris <span class="highlight">Terlaris</span></h2>
        <p>Lengkapi setup gaming mobile Anda sekarang juga.</p>
    </div>
    <div class="products-grid">
        @foreach($featuredProducts as $product)
        <article class="product-card">
            <div class="product-image-container">
                <span class="category-badge">{{ $product->category }}</span>
                <span class="product-rating"><i class="fa-solid fa-star"></i> {{ $product->rating }}</span>
                <!-- Real Product Image with SVG fallback -->
                <img src="{{ asset($product->image_path) }}?v=1.0.1" alt="{{ $product->name }}" class="product-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <svg style="display:none;" width="150" height="150" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="100" height="100" rx="16" fill="#0d1b3e" />
                    @if($product->category == 'Cooler')
                        <circle cx="50" cy="50" r="30" fill="none" stroke="#00d8f6" stroke-width="4" />
                        <path d="M50 20 L50 80 M20 50 L80 50" stroke="#00d8f6" stroke-width="4" stroke-linecap="round" />
                    @elseif($product->category == 'Sleeves')
                        <rect x="35" y="20" width="30" height="60" rx="10" fill="none" stroke="#00d8f6" stroke-width="4" />
                        <path d="M35 40 H65 M35 60 H65" stroke="#00d8f6" stroke-width="2" />
                    @elseif($product->category == 'Pouch')
                        <rect x="28" y="25" width="44" height="50" rx="10" fill="none" stroke="#00d8f6" stroke-width="4" />
                        <path d="M50 25 V75" stroke="#00d8f6" stroke-width="3" stroke-dasharray="3 2" />
                        <circle cx="50" cy="50" r="8" fill="none" stroke="#00d8f6" stroke-width="3" />
                    @elseif($product->category == 'Triggers')
                        <rect x="25" y="35" width="50" height="30" rx="8" fill="none" stroke="#00d8f6" stroke-width="4" />
                        <path d="M40 35 V20 M60 35 V20" stroke="#00d8f6" stroke-width="4" stroke-linecap="round" />
                    @else
                        <circle cx="35" cy="50" r="15" fill="none" stroke="#00d8f6" stroke-width="4" />
                        <circle cx="65" cy="50" r="15" fill="none" stroke="#00d8f6" stroke-width="4" />
                        <path d="M35 65 C35 75 65 75 65 65" stroke="#00d8f6" stroke-width="4" stroke-linecap="round" />
                    @endif
                </svg>
            </div>
            <div class="product-info-box">
                <h3 class="product-title">{{ $product->name }}</h3>
                <p class="product-description">{{ Str::limit($product->description, 75) }}</p>
                <div class="product-price-row">
                    <div class="product-price">
                        <span class="discount-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        @if($product->original_price)
                        <span class="old-price">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                        @endif
                    </div>
                    <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-secondary btn-sm">Detail</a>
                </div>
            </div>
        </article>
        @endforeach
    </div>
    <div style="text-align: center;">
        <a href="{{ route('catalog') }}" class="btn btn-primary">Lihat Semua Produk</a>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="section-title-center">
        <h2>Ulasan <span class="highlight">Komunitas</span></h2>
        <p>Apa kata mereka yang telah membuktikan kekuatan pendinginan es ATLAS.</p>
    </div>
    <div class="testimonials-grid">
        @foreach($testimonials as $test)
        <div class="test-card glass-card">
            <p class="test-message">"{{ $test->message }}"</p>
            <div class="test-profile-row">
                <img src="{{ asset($test->avatar_path) }}?v=1.0.1" alt="{{ $test->name }}" class="test-avatar">
                <div class="test-info">
                    <span class="test-name">{{ $test->name }}</span>
                    <span class="test-role">{{ $test->role }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Contact Message Form -->
<section class="claim-container" style="padding: 4rem 0;">
    <div class="glass-card">
        <h2 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem; text-align: center;">Hubungi <span class="highlight">ATLAS Support</span></h2>
        <p style="color: var(--text-muted); text-align: center; margin-bottom: 2rem;">Punya pertanyaan seputar produk atau kerja sama? Kirimkan pesan Anda di bawah ini.</p>
        
        <div id="contact-alert-success" class="form-alert form-alert-success"></div>
        <div id="contact-alert-error" class="form-alert form-alert-error"></div>

        <form action="{{ route('contact.store') }}" method="POST" id="contact-form">
            @csrf
            <div class="form-group">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-input" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Alamat Email</label>
                <input type="email" name="email" id="email" class="form-input" placeholder="contoh@email.com" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="message">Pesan Anda</label>
                <textarea name="message" id="message" class="form-input" rows="5" placeholder="Tulis pesan atau pertanyaan Anda di sini..." required style="resize: vertical; min-height: 100px;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="contact-submit-btn" style="width: 100%;">
                Kirim Pesan <i class="fa-solid fa-paper-plane"></i>
            </button>
        </form>
    </div>
</section>
@endsection
