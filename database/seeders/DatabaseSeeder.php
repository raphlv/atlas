<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Product::truncate();
        Testimonial::truncate();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        // 1. Seed Products
        $products = [
            [
                'name' => 'Atlas Gaming Fan Cooler',
                'slug' => 'atlas-gaming-fan-cooler',
                'category' => 'Cooler',
                'price' => 249000,
                'original_price' => 349000,
                'image_path' => '/images/cooler.png',
                'description' => 'Phone cooler gaming premium ATLAS dengan arsitektur 7 Aero-Blade kipas pendingin berkecepatan tinggi dan display indikator suhu pintar. Jaga suhu perangkat Anda tetap dingin maksimal, no frame drop saat push rank.',
                'specs' => [
                    'Cooling Engine' => '3X Airflow Cooling System',
                    'Kipas' => '7 Aero-Blade Turbo Fan',
                    'Heatsink' => '55 Ultra-thin Aluminium Fins',
                    'Display' => 'Smart Screen Display (-20°C Real-time)',
                    'Kebisingan' => 'Ultra-quiet Operation',
                    'Bobot' => '68 Gram'
                ],
                'features' => [
                    'Menggunakan 7 Aero-Blade kipas pendingin bersirkulasi udara tinggi.',
                    'Dilengkapi display pembaca suhu pintar real-time digital.',
                    'Mencakup 55 sirip aluminium ultra-tipis untuk transfer panas maksimal.',
                    'Desain ringkas dan ergonomis dengan logo Atlas Gear menyala.'
                ],
                'rating' => 4.9,
                'shopee_link' => 'https://shopee.co.id/tokoteknopro',
                'tokopedia_link' => 'https://www.tokopedia.com/tokoteknopro/search?q=Gaming%20Fan%20Cooler',
                'is_featured' => true
            ],
            [
                'name' => 'Sarung Jempol Gaming Atlas',
                'slug' => 'sarung-jempol-gaming-atlas',
                'category' => 'Sleeves',
                'price' => 35000,
                'original_price' => 50000,
                'image_path' => '/images/sleeves.png',
                'description' => 'Sarung jempol gaming rajut serat perak berkualitas tinggi dengan logo serigala menyala. Precision lebih tinggi, swipe lebih halus, dan aim lebih tajam tanpa keringat.',
                'specs' => [
                    'Material' => '100% Conductive Silver Fiber',
                    'Kerapatan Rajutan' => '24-Pin Precision Seamless Knit',
                    'Logo' => 'Luminous Wolf Icon (Glow in the Dark)',
                    'Ketebalan' => '0.22mm Ultra-thin',
                    'Isi Kemasan' => '1 Pasang (2 Pcs)'
                ],
                'features' => [
                    'Akurasi presisi lebih tinggi untuk pergerakan analog yang mulus.',
                    'Drag-swipe lebih halus di atas layar sentuh tanpa hambatan.',
                    'Aim menembak lebih tajam di game FPS mobile seperti PUBGM & Free Fire.',
                    'Menyerap keringat jempol secara instan untuk konsistensi bermain.'
                ],
                'rating' => 4.8,
                'shopee_link' => 'https://shopee.co.id/tokoteknopro',
                'tokopedia_link' => 'https://www.tokopedia.com/tokoteknopro/search?q=Sarung%20Jempol',
                'is_featured' => true
            ],
            [
                'name' => 'Atlas Heatsink',
                'slug' => 'atlas-heatsink',
                'category' => 'Cooler',
                'price' => 189000,
                'original_price' => 289000,
                'image_path' => '/images/heatsink.png',
                'description' => 'Heatsink magnetic berkinerja tinggi ATLAS GEAR dengan kemampuan hantaran dingin instan. Thermal control maksimal untuk sesi gaming panjang tanpa kompromi.',
                'specs' => [
                    'Konektivitas' => 'MagSafe Compatible / Universal Magnetic Snap',
                    'Cooling Engine' => 'High-Performance Thermal Dissipation Core',
                    'Material' => 'Premium Alloy Chassis with Copper Plate',
                    'Desain' => 'Transparan dengan Wolf Logo',
                    'Kecocokan' => 'Universal Smartphone & Tablet'
                ],
                'features' => [
                    'Mendukung kendali termal maksimal untuk gaming sesi panjang.',
                    'Desain ultra-tipis hemat daya tanpa mengorbankan performa.',
                    'Lempengan tembaga konduktif termal terbaik untuk penyerapan panas kilat.',
                    'Kompatibilitas universal MagSafe untuk pemasangan yang kokoh.'
                ],
                'rating' => 4.9,
                'shopee_link' => 'https://shopee.co.id/tokoteknopro',
                'tokopedia_link' => 'https://www.tokopedia.com/tokoteknopro/search?q=Atlas%20Heatsink',
                'is_featured' => true
            ],
            [
                'name' => 'Atlas Premium Pouch',
                'slug' => 'atlas-premium-pouch',
                'category' => 'Pouch',
                'price' => 99000,
                'original_price' => 149000,
                'image_path' => '/images/pouch.png',
                'description' => 'Pouch penyimpanan premium tahan air dan benturan bermerek ATLAS. Menyimpan semua aksesoris gaming ATLAS Anda di satu tempat yang bersih dan rapi. Clean. Ready. Game ready anytime.',
                'specs' => [
                    'Material' => 'Waterproof EVA Hard Shell',
                    'Ritsleting' => 'Double Sealed Zipper',
                    'Kompartemen' => 'Custom Mesh Organizer Pocket',
                    'Fitur Keamanan' => 'Shockproof & Scratch-resistant Internal lining',
                    'Dimensi' => 'Compact Travel Friendly Size'
                ],
                'features' => [
                    'Semua gear gaming penting kamu muat dalam satu tempat.',
                    'Bahan EVA Hard Shell tahan benturan untuk perlindungan maksimal.',
                    'Desain ramping, bersih, dan ringkas siap dibawa tanding kapan saja.',
                    'Saku jala elastis internal menjaga kabel dan trigger tetap aman.'
                ],
                'rating' => 4.7,
                'shopee_link' => 'https://shopee.co.id/tokoteknopro',
                'tokopedia_link' => 'https://www.tokopedia.com/tokoteknopro/search?q=Atlas%20Premium%20Pouch',
                'is_featured' => true
            ]
        ];

        foreach ($products as $p) {
            Product::create($p);
        }

        // 2. Seed Testimonials
        $testimonials = [
            [
                'name' => 'BTR Kenn',
                'role' => 'Professional MLBB Esports Player',
                'avatar_path' => '/images/avatar_kenn.png',
                'rating' => 5,
                'message' => 'Atlas Gaming Fan Cooler bener-bener gila dinginnya! Pas turnamen besar atau scrim seharian, suhu HP tetep stabil. No lag, FPS lancar jaya!'
            ],
            [
                'name' => 'Sarah "GamerGirl"',
                'role' => 'TikTok Gaming Content Creator',
                'avatar_path' => '/images/avatar_sarah.png',
                'rating' => 5,
                'message' => 'Udah nyobain macem-macem finger sleeve, tapi Sarung Jempol Gaming Atlas paling mantep. Bahan silver fiber-nya tipis, ga keringetan, dan presisi parah pas aim.'
            ],
            [
                'name' => 'Glenn Adrian',
                'role' => 'Tech & Gadget Reviewer',
                'avatar_path' => '/images/avatar_glenn.png',
                'rating' => 5,
                'message' => 'Desain heatsink mereka keren abis! Atlas Heatsink beneran bikin bagian belakang HP berembun es saking dinginnya. Kipasnya juga sunyi ga ganggu rekaman review.'
            ]
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
