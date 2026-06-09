<?php $__env->startSection('title', 'Produk - DAFARIDIK'); ?>

<?php $__env->startSection('content'); ?>

<section class="py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 animate-on-scroll">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold" style="color: #215B63;">Produk</h1>
                <p class="mt-2 text-gray-600">Koleksi lengkap pakaian pria DAFARIDIK</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="<?php echo e(route('products.index')); ?>"
                   class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200 <?php if(!request('category') && !request('sort')): ?> text-white shadow-sm <?php else: ?> bg-white text-gray-600 hover:shadow-sm <?php endif; ?>"
                   style="<?php if(!request('category') && !request('sort')): ?> background-color: #124170; <?php endif; ?>">
                    Semua
                </a>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('products.index', array_filter(array_merge(request()->all(), ['category' => $cat->slug, 'page' => null])))); ?>"
                   class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200 <?php if(request('category') === $cat->slug): ?> text-white shadow-sm <?php else: ?> bg-white text-gray-600 hover:shadow-sm <?php endif; ?>"
                   style="<?php if(request('category') === $cat->slug): ?> background-color: #124170; <?php endif; ?>">
                    <?php echo e($cat->name); ?>

                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="flex justify-end mb-6">
            <form method="GET" action="<?php echo e(route('products.index')); ?>" class="flex items-center gap-2">
                <?php if(request('category')): ?>
                    <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
                <?php endif; ?>
                <label class="text-sm text-gray-600 font-medium">Urutkan:</label>
                <select name="sort" onchange="this.form.submit()"
                        class="text-sm border-0 bg-white rounded-xl px-4 py-2 shadow-sm focus:ring-2 focus:ring-[#67C090] transition-all">
                    <option value="">Terbaru</option>
                    <option value="price_asc" <?php if(request('sort') === 'price_asc'): ?> selected <?php endif; ?>>Harga: Rendah ke Tinggi</option>
                    <option value="price_desc" <?php if(request('sort') === 'price_desc'): ?> selected <?php endif; ?>>Harga: Tinggi ke Rendah</option>
                </select>
            </form>
        </div>

        <?php if($products->count() > 0): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden animate-on-scroll">
                <a href="<?php echo e(route('products.show', $product)); ?>" class="block overflow-hidden aspect-[4/5]">
                    <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    <?php if($product->is_new_arrival): ?>
                        <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-bold text-white" style="background-color: #124170;">NEW</span>
                    <?php endif; ?>
                    <?php if($product->is_best_seller): ?>
                        <span class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-bold text-white" style="background-color: #215B63;">BEST</span>
                    <?php endif; ?>
                </a>
                <div class="p-4">
                    <span class="text-xs font-semibold px-2 py-1 rounded-full" style="color: #124170; background-color: #AAFFC7;">
                        <?php echo e($product->category->name); ?>

                    </span>
                    <a href="<?php echo e(route('products.show', $product)); ?>">
                        <h3 class="mt-2 font-semibold text-gray-800 group-hover:text-[#124170] transition-colors line-clamp-2"><?php echo e($product->name); ?></h3>
                    </a>
                    <p class="mt-1 text-sm font-bold" style="color: #215B63;"><?php echo e($product->formatted_price); ?></p>
                    <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="mt-3">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                        <button type="submit" class="w-full py-2 px-4 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-[1.02] active:scale-95 text-white" style="background-color: #124170;">
                            + Tambah ke Cart
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-12">
            <?php echo e($products->withQueryString()->links()); ?>

        </div>
        <?php else: ?>
        <div class="text-center py-20">
            <svg class="w-20 h-20 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
            <h3 class="text-xl font-semibold text-gray-500">Tidak ada produk ditemukan</h3>
            <p class="text-gray-400 mt-2">Coba filter kategori lain</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\DIKSHOP\resources\views/products/index.blade.php ENDPATH**/ ?>