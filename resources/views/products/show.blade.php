@extends('layouts.app')

@section('title', $product->name . ' - DAFARIDIK')

@section('content')

<section class="py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-8 text-sm text-gray-500 animate-on-scroll">
            <a href="{{ route('home') }}" class="hover:text-[#124170] transition-colors">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('products.index') }}" class="hover:text-[#124170] transition-colors">Produk</a>
            <span class="mx-2">/</span>
            <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="hover:text-[#124170] transition-colors">{{ $product->category->name }}</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">{{ $product->name }}</span>
        </nav>

        <div class="grid md:grid-cols-2 gap-10 lg:gap-16">
            <div class="animate-on-scroll">
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm aspect-[4/5]">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
                </div>
            </div>

            <div class="animate-on-scroll">
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold" style="color: #124170; background-color: #AAFFC7;">
                        {{ $product->category->name }}
                    </span>
                    @if($product->is_new_arrival)
                        <span class="px-3 py-1 rounded-full text-xs font-bold text-white" style="background-color: #124170;">New Arrival</span>
                    @endif
                    @if($product->is_best_seller)
                        <span class="px-3 py-1 rounded-full text-xs font-bold text-white" style="background-color: #215B63;">Best Seller</span>
                    @endif
                </div>

                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>

                <p class="text-3xl font-bold mb-6" style="color: #124170;">{{ $product->formatted_price }}</p>

                <div class="prose prose-sm text-gray-600 mb-8 leading-relaxed">
                    <p>{{ $product->description }}</p>
                </div>

                <form action="{{ route('cart.add') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center gap-4">
                        <label class="text-sm font-medium text-gray-700">Jumlah:</label>
                        <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden">
                            <button type="button" onclick="decrementQty()" class="px-4 py-2 hover:bg-gray-50 transition-colors text-gray-500">−</button>
                            <input type="number" name="qty" id="qty-input" value="1" min="1" max="99" class="w-16 text-center border-x border-gray-200 py-2 text-sm font-medium focus:outline-none">
                            <button type="button" onclick="incrementQty()" class="px-4 py-2 hover:bg-gray-50 transition-colors text-gray-500">+</button>
                        </div>
                    </div>
                    <button type="submit" class="w-full md:w-auto px-10 py-3 rounded-xl font-semibold text-sm text-white transition-all duration-300 hover:scale-105 active:scale-95 hover:shadow-lg" style="background-color: #124170;">
                        + Tambah ke Keranjang
                    </button>
                </form>

                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="flex items-center gap-6 text-sm text-gray-500">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" style="color: #67C090;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Stok tersedia</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" style="color: #67C090;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <span>Garansi 7 hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($related->count() > 0)
<section class="py-12 md:py-16" style="background-color: #124170/5;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold mb-10" style="color: #215B63;">Produk Terkait</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($related as $rel)
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden animate-on-scroll">
                <a href="{{ route('products.show', $rel) }}" class="block overflow-hidden aspect-[4/5]">
                    <img src="{{ $rel->image }}" alt="{{ $rel->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                </a>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 group-hover:text-[#124170] transition-colors">{{ $rel->name }}</h3>
                    <p class="mt-1 text-sm font-bold" style="color: #215B63;">{{ $rel->formatted_price }}</p>
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $rel->id }}">
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
@endif

<script>
    function decrementQty() {
        const input = document.getElementById('qty-input');
        const val = parseInt(input.value) || 1;
        if (val > 1) input.value = val - 1;
    }
    function incrementQty() {
        const input = document.getElementById('qty-input');
        const val = parseInt(input.value) || 1;
        if (val < 99) input.value = val + 1;
    }
</script>

@endsection
