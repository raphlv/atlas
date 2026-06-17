@extends('layouts.app')

@section('content')
<div class="claim-container">
    <div class="glass-card">
        <h2 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem; text-align: center;">Klaim Garansi & <span class="highlight">Dukungan Produk</span></h2>
        <p style="color: var(--text-muted); text-align: center; margin-bottom: 2.5rem;">
            Setiap produk ATLAS GEAR dilindungi garansi resmi. Isi formulir di bawah ini untuk mengajukan klaim perbaikan atau penggantian unit baru.
        </p>

        <div id="warranty-alert-success" class="form-alert form-alert-success"></div>
        <div id="warranty-alert-error" class="form-alert form-alert-error"></div>

        <form action="{{ route('warranty.store') }}" method="POST" id="warranty-form">
            @csrf
            <div class="form-group">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-input" placeholder="Masukkan nama lengkap sesuai identitas" required>
            </div>

            <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div>
                    <label class="form-label" for="email">Alamat Email</label>
                    <input type="email" name="email" id="email" class="form-input" placeholder="nama@email.com" required>
                </div>
                <div>
                    <label class="form-label" for="phone">Nomor WhatsApp/HP</label>
                    <input type="text" name="phone" id="phone" class="form-input" placeholder="08xxxxxxxxxx" required>
                </div>
            </div>

            <div class="form-group" style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 1rem;">
                <div>
                    <label class="form-label" for="product_name">Pilih Produk ATLAS Anda</label>
                    <select name="product_name" id="product_name" class="form-select" required>
                        <option value="">-- Pilih Produk --</option>
                        @foreach($productsList as $product)
                            <option value="{{ $product->name }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label" for="invoice_number">Nomor Invoice Pembelian</label>
                    <input type="text" name="invoice_number" id="invoice_number" class="form-input" placeholder="INV/2026/XX/XXX" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="message">Deskripsi Keluhan / Kerusakan</label>
                <textarea name="message" id="message" class="form-input" rows="5" placeholder="Jelaskan secara rinci kerusakan atau masalah teknis pada produk Anda..." required style="resize: vertical; min-height: 100px;"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" id="warranty-submit-btn" style="width: 100%; font-size: 1rem; margin-top: 1rem;">
                Kirim Pengajuan Klaim <i class="fa-solid fa-shield-halved"></i>
            </button>
        </form>
    </div>
</div>
@endsection
