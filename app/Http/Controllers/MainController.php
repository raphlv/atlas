<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Message;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::where('is_featured', true)->get();
        $testimonials = Testimonial::orderBy('id', 'asc')->get();
        return view('home', compact('featuredProducts', 'testimonials'));
    }

    public function catalog(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->filled('sort')) {
            $sort = $request->input('sort');
            if ($sort == 'price_low') {
                $query->orderBy('price', 'asc');
            } elseif ($sort == 'price_high') {
                $query->orderBy('price', 'desc');
            } else {
                $query->orderBy('id', 'desc');
            }
        } else {
            $query->orderBy('id', 'desc');
        }

        $products = $query->paginate(12)->withQueryString();
        
        return view('catalog', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(3)
            ->get();
            
        return view('product-detail', compact('product', 'relatedProducts'));
    }

    public function simulator()
    {
        return view('simulator');
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'message' => 'required|string|min:10',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'message.required' => 'Pesan wajib diisi.',
            'message.min' => 'Pesan minimal berisi 10 karakter.',
        ]);

        $validated['type'] = 'contact';

        Message::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Pesan Anda berhasil terkirim! Tim kami akan menghubungi Anda segera.'
            ]);
        }

        return redirect()->back()->with('success', 'Pesan Anda berhasil terkirim!');
    }

    public function warranty()
    {
        $productsList = Product::orderBy('name', 'asc')->get();
        return view('warranty', compact('productsList'));
    }

    public function storeWarranty(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'product_name' => 'required|string|max:150',
            'invoice_number' => 'required|string|max:50',
            'message' => 'required|string|min:10',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'phone.required' => 'Nomor HP wajib diisi.',
            'product_name.required' => 'Nama produk wajib diisi.',
            'invoice_number.required' => 'Nomor invoice wajib diisi.',
            'message.required' => 'Keluhan produk wajib diisi.',
            'message.min' => 'Deskripsi keluhan minimal berisi 10 karakter.',
        ]);

        $validated['type'] = 'warranty';

        Message::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Klaim garansi berhasil didaftarkan! Tim teknis kami akan memproses pengajuan Anda dalam 1-2 hari kerja.'
            ]);
        }

        return redirect()->back()->with('success', 'Klaim garansi Anda berhasil didaftarkan!');
    }
}
