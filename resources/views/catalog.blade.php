@extends('layouts.app')

@section('content')
<div class="catalog-page-container">
    <div class="section-title-center" style="margin-bottom: 2rem;">
        <h2>Katalog <span class="highlight">Gaming Gear</span></h2>
        <p>Temukan aksesoris penunjang performa gaming mobile terbaik dari ATLAS.</p>
    </div>

    <!-- Filter & Search Bar -->
    <div class="catalog-header-bar">
        <!-- Category Tabs -->
        <div class="catalog-filter-tabs">
            <a href="{{ route('catalog') }}" class="catalog-tab-btn {{ !request('category') ? 'active' : '' }}">Semua</a>
            <a href="{{ route('catalog', ['category' => 'Cooler']) }}" class="catalog-tab-btn {{ request('category') == 'Cooler' ? 'active' : '' }}">Coolers</a>
            <a href="{{ route('catalog', ['category' => 'Sleeves']) }}" class="catalog-tab-btn {{ request('category') == 'Sleeves' ? 'active' : '' }}">Thumb Sleeves</a>
            <a href="{{ route('catalog', ['category' => 'Triggers']) }}" class="catalog-tab-btn {{ request('category') == 'Triggers' ? 'active' : '' }}">Triggers</a>
            <a href="{{ route('catalog', ['category' => 'Earphones']) }}" class="catalog-tab-btn {{ request('category') == 'Earphones' ? 'active' : '' }}">Earphones</a>
        </div>

        <!-- Search and Sort form -->
        <form action="{{ route('catalog') }}" method="GET" class="catalog-search-form">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama aksesoris..." class="catalog-search-input">
            
            <select name="sort" class="catalog-select-sort" onchange="this.form.submit()">
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
            </select>
            <button type="submit" class="btn btn-primary btn-sm" style="padding: 0.6rem 1rem;"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>

    <!-- Products Grid -->
    @if($products->count() > 0)
        <div class="products-grid">
            @foreach($products as $product)
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
                    <p class="product-description">{{ Str::limit($product->description, 80) }}</p>
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

        <!-- Custom Pagination Links -->
        <div class="pagination-container" style="display: flex; justify-content: center; margin-top: 3rem;">
            {{ $products->links() }}
        </div>
    @else
        <div class="glass-card" style="text-align: center; padding: 4rem 2rem;">
            <i class="fa-solid fa-circle-info" style="font-size: 3rem; color: var(--accent-blue); margin-bottom: 1rem;"></i>
            <h3>Produk tidak ditemukan</h3>
            <p style="color: var(--text-muted); margin-top: 0.5rem;">Coba gunakan kata kunci pencarian lain atau pilih kategori yang berbeda.</p>
            <a href="{{ route('catalog') }}" class="btn btn-primary" style="margin-top: 1.5rem;">Kembali ke Semua Produk</a>
        </div>
    @endif
</div>
@endsection
