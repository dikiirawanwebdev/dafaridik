@extends('layouts.app')

@section('title', 'Keranjang - DAFARIDIK')

@section('content')

<section class="py-12 md:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="animate-on-scroll">
            <h1 class="text-3xl md:text-4xl font-bold" style="color: #215B63;">Keranjang Belanja</h1>
            <p class="mt-2 text-gray-600">Kelola barang belanjaan kamu</p>
        </div>

        @if($products->count() > 0)
        <div class="mt-10 space-y-4">
            @foreach($products as $product)
            <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6 animate-on-scroll transition-all duration-300 hover:shadow-md">
                <div class="flex gap-4">
                    <div class="w-20 h-20 md:w-24 md:h-24 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-2">
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ $product->name }}</h3>
                                <p class="text-sm font-bold mt-1" style="color: #124170;">{{ $product->formatted_price }}</p>
                            </div>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors p-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="flex items-center justify-between mt-3">
                            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden">
                                    <button type="button" onclick="decrement({{ $product->id }})" class="px-3 py-1.5 hover:bg-gray-50 transition-colors text-gray-500 text-sm">−</button>
                                    <input type="number" name="qty" id="qty-{{ $product->id }}" value="{{ $product->cart_qty }}" min="0" max="99" class="w-12 text-center border-x border-gray-200 py-1.5 text-sm font-medium focus:outline-none" readonly>
                                    <button type="button" onclick="increment({{ $product->id }})" class="px-3 py-1.5 hover:bg-gray-50 transition-colors text-gray-500 text-sm">+</button>
                                </div>
                                <button type="submit" class="text-xs font-medium px-3 py-1.5 rounded-lg transition-colors" style="color: #124170; background-color: #AAFFC7;">Update</button>
                            </form>
                            <p class="text-sm font-bold" style="color: #215B63;">{{ 'Rp' . number_format($product->subtotal, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8 bg-white rounded-2xl shadow-sm p-6 md:p-8 animate-on-scroll">
            <div class="flex items-center justify-between mb-6">
                <span class="text-lg font-semibold text-gray-800">Total Belanja</span>
                <span class="text-2xl font-bold" style="color: #124170;">{{ 'Rp' . number_format($total, 0, ',', '.') }}</span>
            </div>
            @if($total < 200000)
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-6 p-3 rounded-xl" style="background-color: #AAFFC7/50;">
                    <svg class="w-5 h-5 flex-shrink-0" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Belanja <strong>Rp{{ number_format(200000 - $total, 0, ',', '.') }}</strong> lagi untuk gratis ongkir!</span>
                </div>
            @else
                <div class="flex items-center gap-2 text-sm mb-6 p-3 rounded-xl font-medium" style="background-color: #67C090/20; color: #215B63;">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Selamat! Kamu mendapatkan <strong>GRATIS ONGKIR</strong> 🎉</span>
                </div>
            @endif
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('products.index') }}" class="flex-1 text-center py-3 rounded-xl font-semibold text-sm transition-all duration-300 border-2 hover:bg-gray-50" style="border-color: #124170; color: #124170;">
                    Lanjut Belanja
                </a>
                <a href="{{ route('cart.checkout') }}" class="flex-1 text-center py-3 rounded-xl font-semibold text-sm text-white transition-all duration-300 hover:scale-[1.02] active:scale-95 hover:shadow-lg" style="background-color: #124170;">
                    Checkout via WhatsApp
                </a>
            </div>
        </div>
        @else
        <div class="text-center py-20 animate-on-scroll">
            <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
            </svg>
            <h2 class="text-2xl font-bold text-gray-400 mb-2">Keranjang Kosong</h2>
            <p class="text-gray-400 mb-8">Yuk, isi keranjang belanja kamu dengan produk terbaik DAFARIDIK</p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-3 rounded-xl font-semibold text-sm text-white transition-all duration-300 hover:scale-105 hover:shadow-lg" style="background-color: #124170;">
                Mulai Belanja
            </a>
        </div>
        @endif
    </div>
</section>

<script>
    function decrement(id) {
        const input = document.getElementById('qty-' + id);
        const val = parseInt(input.value) || 1;
        if (val > 1) input.value = val - 1;
    }
    function increment(id) {
        const input = document.getElementById('qty-' + id);
        const val = parseInt(input.value) || 1;
        if (val < 99) input.value = val + 1;
    }
</script>

@endsection
