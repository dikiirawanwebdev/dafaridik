@extends('layouts.app')

@section('title', 'DAFARIDIK - Toko Pakaian Pria')

@section('content')

{{-- Hero Section --}}
<section class="relative overflow-hidden" style="background: linear-gradient(135deg, #AAFFC7 0%, #67C090 50%, #215B63 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="animate-fade-in">
                <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold mb-6 bg-white/20 backdrop-blur-sm text-white">
                    New Collection 2024
                </span>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                    Tampil Gaya <br>dengan <span class="underline decoration-4 underline-offset-8 decoration-[#124170]">DAFARIDIK</span>
                </h1>
                <p class="text-lg text-white/90 mb-8 leading-relaxed max-w-lg">
                    Temukan koleksi pakaian pria terbaik untuk gaya sehari-hari. Dari kasual hingga formal, semua ada di sini.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-3 rounded-xl font-semibold text-sm transition-all duration-300 hover:scale-105 hover:shadow-lg" style="background-color: #124170; color: white;">
                        Belanja Sekarang
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="#best-seller" class="inline-flex items-center px-8 py-3 rounded-xl font-semibold text-sm bg-white/20 backdrop-blur-sm text-white transition-all duration-300 hover:bg-white/30 hover:scale-105">
                        Lihat Koleksi
                    </a>
                </div>
            </div>
            <div class="hidden md:flex justify-center animate-fade-in">
                <div class="relative">
                    <div class="w-80 h-80 rounded-full bg-white/10 backdrop-blur-sm absolute -top-10 -right-10"></div>
                    <div class="w-72 h-72 rounded-full bg-white/10 backdrop-blur-sm absolute -bottom-10 -left-10"></div>
                    <div class="relative z-10 p-8">
                        <svg class="w-64 h-64 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-[#AAFFC7] to-transparent"></div>
</section>

{{-- Best Seller Section --}}
<section id="best-seller" class="py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold" style="color: #215B63;">Best Seller</h2>
            <p class="mt-3 text-gray-600 max-w-md mx-auto">Produk paling laris dan favorit pelanggan DAFARIDIK</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($bestSellers as $product)
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden animate-on-scroll">
                <a href="{{ route('products.show', $product) }}" class="block overflow-hidden aspect-[4/5]">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                </a>
                <div class="p-4">
                    <span class="text-xs font-semibold px-2 py-1 rounded-full" style="color: #124170; background-color: #AAFFC7;">
                        {{ $product->category->name }}
                    </span>
                    <a href="{{ route('products.show', $product) }}">
                        <h3 class="mt-2 font-semibold text-gray-800 group-hover:text-[#124170] transition-colors line-clamp-2">{{ $product->name }}</h3>
                    </a>
                    <p class="mt-1 text-sm font-bold" style="color: #215B63;">{{ $product->formatted_price }}</p>
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="w-full py-2 px-4 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-[1.02] active:scale-95 text-white" style="background-color: #124170;">
                            + Tambah ke Cart
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Categories Section --}}
<section class="py-16 md:py-20" style="background-color: #67C090/10;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold" style="color: #215B63;">Kategori</h2>
            <p class="mt-3 text-gray-600">Cari berdasarkan kategori pakaian yang kamu butuhkan</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 overflow-hidden animate-on-scroll">
                <div class="aspect-square flex items-center justify-center p-8" style="background: linear-gradient(135deg, #AAFFC7 0%, #67C090 100%);">
                    <svg class="w-20 h-20 text-white/80 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @switch($loop->index)
                            @case(0)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                @break
                            @case(1)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                @break
                            @case(2)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                                @break
                            @case(3)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                @break
                        @endswitch
                    </svg>
                </div>
                <div class="p-4 text-center">
                    <h3 class="font-semibold text-gray-800 group-hover:text-[#124170] transition-colors">{{ $category->name }}</h3>
                    <p class="text-xs text-gray-500 mt-1">{{ $category->products_count ?? $category->products()->count() }} Produk</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Promo Banner --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl overflow-hidden animate-on-scroll" style="background: linear-gradient(135deg, #124170 0%, #215B63 50%, #67C090 100%);">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 400 200" fill="none">
                    <circle cx="50" cy="50" r="100" fill="white"/>
                    <circle cx="350" cy="150" r="150" fill="white"/>
                    <circle cx="200" cy="100" r="80" fill="white"/>
                </svg>
            </div>
            <div class="relative z-10 px-8 py-12 md:px-16 md:py-20 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Gratis Ongkir!</h2>
                <p class="text-lg text-white/90 mb-8 max-w-lg mx-auto">
                    Nikmati gratis ongkir untuk setiap pembelian minimal <span class="font-bold text-[#AAFFC7]">Rp200.000</span>
                </p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-3 rounded-xl font-semibold text-sm transition-all duration-300 hover:scale-105 hover:shadow-lg" style="background-color: #AAFFC7; color: #124170;">
                    Belanja Sekarang
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- New Arrival Section --}}
<section class="py-16 md:py-20" style="background-color: #124170/5;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 animate-on-scroll">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold" style="color: #215B63;">New Arrival</h2>
                <p class="mt-3 text-gray-600">Koleksi terbaru DAFARIDIK untuk tampilan lebih fresh</p>
            </div>
            <a href="{{ route('products.index') }}" class="mt-4 md:mt-0 inline-flex items-center font-semibold text-sm transition-all duration-300 hover:gap-2" style="color: #124170;">
                Lihat Semua
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($newArrivals as $product)
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden animate-on-scroll">
                <div class="relative overflow-hidden aspect-[4/5]">
                    <a href="{{ route('products.show', $product) }}">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    </a>
                    <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-bold text-white animate-scale-in" style="background-color: #124170;">
                        NEW
                    </span>
                </div>
                <div class="p-4">
                    <span class="text-xs font-semibold px-2 py-1 rounded-full" style="color: #124170; background-color: #AAFFC7;">
                        {{ $product->category->name }}
                    </span>
                    <a href="{{ route('products.show', $product) }}">
                        <h3 class="mt-2 font-semibold text-gray-800 group-hover:text-[#124170] transition-colors line-clamp-2">{{ $product->name }}</h3>
                    </a>
                    <p class="mt-1 text-sm font-bold" style="color: #215B63;">{{ $product->formatted_price }}</p>
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="w-full py-2 px-4 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-[1.02] active:scale-95 text-white" style="background-color: #124170;">
                            + Tambah ke Cart
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Features --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm text-center animate-on-scroll">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-4" style="background-color: #AAFFC7;">
                    <svg class="w-6 h-6" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Produk Berkualitas</h3>
                <p class="text-sm text-gray-500 mt-2">Bahan premium, nyaman dipakai, dan tahan lama</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm text-center animate-on-scroll">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-4" style="background-color: #AAFFC7;">
                    <svg class="w-6 h-6" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Mudah Ditukar</h3>
                <p class="text-sm text-gray-500 mt-2">Garansi 7 hari tukar ukuran jika tidak cocok</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm text-center animate-on-scroll">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-4" style="background-color: #AAFFC7;">
                    <svg class="w-6 h-6" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Belanja Mudah</h3>
                <p class="text-sm text-gray-500 mt-2">Checkout via WhatsApp, cepat dan praktis</p>
            </div>
        </div>
    </div>
</section>

@endsection
