@extends('admin.layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <div data-reveal="fade-up">
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.products.index') }}" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m7 7l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Tambah Produk</h1>
                <p class="text-gray-500 mt-1">Tambahkan produk baru ke toko</p>
            </div>
        </div>
    </div>

    <div class="mt-6 bg-white rounded-2xl shadow-sm p-6 md:p-8" data-reveal="fade-up" data-reveal-delay="150">
        <form action="{{ route('admin.products.store') }}" method="POST" class="max-w-2xl space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                <div data-reveal="fade-up" data-reveal-delay="200">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="w-full px-4 py-2.5 rounded-xl border @error('name') border-red-300 @else border-gray-200 @enderror focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"
                           required>
                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div data-reveal="fade-up" data-reveal-delay="250">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id"
                            class="w-full px-4 py-2.5 rounded-xl border @error('category_id') border-red-300 @else border-gray-200 @enderror focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"
                            required>
                        <option value="">Pilih kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div data-reveal="fade-up" data-reveal-delay="300">
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1.5">Harga (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}"
                           class="w-full px-4 py-2.5 rounded-xl border @error('price') border-red-300 @else border-gray-200 @enderror focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"
                           min="0" required>
                    @error('price') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div data-reveal="fade-up" data-reveal-delay="350">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1.5">URL Gambar <span class="text-red-500">*</span></label>
                    <input type="url" name="image" id="image" value="{{ old('image') }}"
                           class="w-full px-4 py-2.5 rounded-xl border @error('image') border-red-300 @else border-gray-200 @enderror focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"
                           placeholder="https://images.unsplash.com/photo-..." required>
                    @error('image') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div data-reveal="fade-up" data-reveal-delay="400">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2.5 rounded-xl border @error('description') border-red-300 @else border-gray-200 @enderror focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"
                          required>{{ old('description') }}</textarea>
                @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-8" data-reveal="fade-up" data-reveal-delay="450">
                <label class="flex items-center gap-2.5 cursor-pointer group">
                    <input type="checkbox" name="is_best_seller" value="1" @checked(old('is_best_seller')) class="w-4 h-4 rounded border-gray-300 text-[#124170] focus:ring-[#124170] transition-all">
                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Best Seller</span>
                </label>
                <label class="flex items-center gap-2.5 cursor-pointer group">
                    <input type="checkbox" name="is_new_arrival" value="1" @checked(old('is_new_arrival')) class="w-4 h-4 rounded border-gray-300 text-[#124170] focus:ring-[#124170] transition-all">
                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">New Arrival</span>
                </label>
            </div>

            <div class="flex gap-3 pt-4" data-reveal="fade-up" data-reveal-delay="500">
                <button type="submit" class="px-8 py-2.5 rounded-xl text-sm font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-95 hover:shadow-lg" style="background-color: #124170;">
                    Simpan
                </button>
                <a href="{{ route('admin.products.index') }}" class="px-8 py-2.5 rounded-xl text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors">Batal</a>
            </div>
        </form>
    </div>
@endsection
