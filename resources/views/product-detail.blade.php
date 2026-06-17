@extends('layouts.app')

@section('content')
<div class="detail-container">
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('catalog') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Kembali ke Katalog</a>
    </div>

    <div class="detail-grid">
        <!-- Gallery / Image section -->
        <div class="detail-gallery">
            <span class="category-badge" style="top: 1.5rem; left: 1.5rem;">{{ $product->category }}</span>
            <span class="product-rating" style="top: 1.5rem; right: 1.5rem; font-size: 1rem;"><i class="fa-solid fa-star"></i> {{ $product->rating }}</span>
            <!-- Real Product Image with SVG fallback -->
            <img src="{{ asset($product->image_path) }}?v=1.0.1" alt="{{ $product->name }}" class="detail-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
            <svg style="display:none;" width="250" height="250" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="100" height="100" rx="20" fill="#0d1b3e" />
                @if($product->category == 'Cooler')
                    <circle cx="50" cy="50" r="30" fill="none" stroke="#00d8f6" stroke-width="4" />
                    <path d="M50 20 L50 80 M20 50 L80 50" stroke="#00d8f6" stroke-width="4" stroke-linecap="round" />
                    <circle cx="50" cy="50" r="10" fill="#00d8f6" />
                @elseif($product->category == 'Sleeves')
                    <rect x="35" y="20" width="30" height="60" rx="10" fill="none" stroke="#00d8f6" stroke-width="4" />
                    <path d="M35 35 H65 M35 50 H65 M35 65 H65" stroke="#00d8f6" stroke-width="2" />
                @elseif($product->category == 'Pouch')
                    <rect x="25" y="20" width="50" height="60" rx="12" fill="none" stroke="#00d8f6" stroke-width="4" />
                    <path d="M50 20 V80" stroke="#00d8f6" stroke-width="3" stroke-dasharray="4 2" />
                    <circle cx="50" cy="50" r="10" fill="none" stroke="#00d8f6" stroke-width="3" />
                @elseif($product->category == 'Triggers')
                    <rect x="20" y="30" width="60" height="40" rx="10" fill="none" stroke="#00d8f6" stroke-width="4" />
                    <circle cx="35" cy="50" r="6" fill="#00d8f6" />
                    <circle cx="65" cy="50" r="6" fill="#00d8f6" />
                @else
                    <circle cx="35" cy="50" r="15" fill="none" stroke="#00d8f6" stroke-width="4" />
                    <circle cx="65" cy="50" r="15" fill="none" stroke="#00d8f6" stroke-width="4" />
                    <path d="M35 65 C35 75 65 75 65 65" stroke="#00d8f6" stroke-width="4" stroke-linecap="round" />
                    <path d="M50 20 V80" stroke="#00d8f6" stroke-width="2" stroke-dasharray="4 2" />
                @endif
            </svg>
        </div>

        <!-- Details Info -->
        <div class="detail-info">
            <span class="category">{{ $product->category }}</span>
            <h1>{{ $product->name }}</h1>
            
            <div class="price-row">
                <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                @if($product->original_price)
                <span class="old-price">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                @endif
            </div>

            <p class="description">{{ $product->description }}</p>

            <!-- Specifications Table -->
            @if($product->specs)
            <div class="specs-grid">
                @foreach($product->specs as $key => $val)
                <div class="spec-item">
                    <span class="label">{{ $key }}</span>
                    <span class="value">{{ $val }}</span>
                </div>
                @endforeach
            </div>
            @endif

            <!-- Purchase Buttons to Marketplace -->
            <div class="purchase-actions">
                <h4>Beli Produk di Official Marketplace:</h4>
                <div class="purchase-buttons">
                    <a href="{{ $product->shopee_link ?? 'https://shopee.co.id/tokoteknopro' }}" target="_blank" class="btn btn-shopee">
                        <img src="{{ asset('images/logo_shopee.png') }}" alt="Shopee" class="btn-logo"> Shopee Mall
                    </a>
                    <a href="{{ $product->tokopedia_link ?? 'https://www.tokopedia.com/tokoteknopro' }}" target="_blank" class="btn btn-tokopedia">
                        <img src="{{ asset('images/logo_tokopedia.png') }}" alt="Tokopedia" class="btn-logo"> Tokopedia
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Features list -->
    @if($product->features)
    <div class="feature-highlights-box glass-card" style="margin-bottom: 5rem;">
        <h3>Fitur Unggulan</h3>
        <ul class="features-list" style="margin-top: 1.5rem;">
            @foreach($product->features as $feature)
            <li>
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ $feature }}</span>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <div class="products-section" style="padding: 4rem 0 0 0;">
        <div class="section-title-center" style="margin-bottom: 3rem;">
            <h2>Produk <span class="highlight">Terkait</span></h2>
            <p>Lihat aksesoris mobile gaming sejenis yang mungkin Anda butuhkan.</p>
        </div>
        <div class="products-grid">
            @foreach($relatedProducts as $rel)
            <article class="product-card">
                <div class="product-image-container">
                    <span class="category-badge">{{ $rel->category }}</span>
                    <span class="product-rating"><i class="fa-solid fa-star"></i> {{ $rel->rating }}</span>
                    <!-- Real Product Image with SVG fallback -->
                    <img src="{{ asset($rel->image_path) }}?v=1.0.1" alt="{{ $rel->name }}" class="product-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <svg style="display:none;" width="120" height="120" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="100" height="100" rx="16" fill="#0d1b3e" />
                        @if($rel->category == 'Cooler')
                            <circle cx="50" cy="50" r="30" fill="none" stroke="#00d8f6" stroke-width="4" />
                            <path d="M50 20 L50 80 M20 50 L80 50" stroke="#00d8f6" stroke-width="4" stroke-linecap="round" />
                        @elseif($rel->category == 'Sleeves')
                            <rect x="35" y="20" width="30" height="60" rx="10" fill="none" stroke="#00d8f6" stroke-width="4" />
                            <path d="M35 40 H65 M35 60 H65" stroke="#00d8f6" stroke-width="2" />
                        @elseif($rel->category == 'Pouch')
                            <rect x="28" y="25" width="44" height="50" rx="10" fill="none" stroke="#00d8f6" stroke-width="4" />
                            <path d="M50 25 V75" stroke="#00d8f6" stroke-width="3" stroke-dasharray="3 2" />
                            <circle cx="50" cy="50" r="8" fill="none" stroke="#00d8f6" stroke-width="3" />
                        @elseif($rel->category == 'Triggers')
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
                    <h3 class="product-title">{{ $rel->name }}</h3>
                    <p class="product-description">{{ Str::limit($rel->description, 80) }}</p>
                    <div class="product-price-row">
                        <div class="product-price">
                            <span class="discount-price">Rp {{ number_format($rel->price, 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('product.detail', $rel->slug) }}" class="btn btn-secondary btn-sm">Detail</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
