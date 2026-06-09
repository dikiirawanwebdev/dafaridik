@extends('layouts.app')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('content')

<section class="py-20 md:py-32">
    <div class="max-w-lg mx-auto px-4 text-center">
        <div class="animate-fade-in">
            <div class="inline-flex items-center justify-center w-28 h-28 rounded-full mb-8" style="background: linear-gradient(135deg, #AAFFC7 0%, #67C090 100%);">
                <span class="text-5xl font-extrabold" style="color: #215B63;">404</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Halaman Tidak Ditemukan
            </h1>
            <p class="text-gray-500 mb-8 leading-relaxed">
                Maaf, halaman yang kamu cari tidak ada atau telah dipindahkan.
                Yuk, kembali ke beranda dan temukan produk favoritmu!
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-8 py-3 rounded-xl font-semibold text-sm text-white transition-all duration-300 hover:scale-105 hover:shadow-lg" style="background-color: #124170;">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Kembali ke Beranda
                </a>
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-8 py-3 rounded-xl font-semibold text-sm transition-all duration-300 hover:scale-105 border-2" style="border-color: #124170; color: #124170;">
                    Lihat Produk
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
