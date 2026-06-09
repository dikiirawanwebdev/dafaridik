<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div data-reveal="fade-up">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-500 mt-1">Ringkasan data toko DikStore</p>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mt-8 stagger-children" data-reveal="stagger">
        <div class="bg-white rounded-2xl p-5 md:p-6 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background-color: #AAFFC7;">
                    <svg class="w-5 h-5" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold" style="color: #124170;" data-counter data-target="<?php echo e($totalProducts); ?>" data-duration="800"><?php echo e($totalProducts); ?></p>
            <p class="text-sm text-gray-500 mt-1">Total Produk</p>
        </div>

        <div class="bg-white rounded-2xl p-5 md:p-6 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background-color: #AAFFC7;">
                    <svg class="w-5 h-5" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold" style="color: #124170;" data-counter data-target="<?php echo e($totalCategories); ?>" data-duration="800"><?php echo e($totalCategories); ?></p>
            <p class="text-sm text-gray-500 mt-1">Total Kategori</p>
        </div>

        <div class="bg-white rounded-2xl p-5 md:p-6 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background-color: #AAFFC7;">
                    <svg class="w-5 h-5" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold" style="color: #124170;" data-counter data-target="<?php echo e($totalBestSellers); ?>" data-duration="800"><?php echo e($totalBestSellers); ?></p>
            <p class="text-sm text-gray-500 mt-1">Best Seller</p>
        </div>

        <div class="bg-white rounded-2xl p-5 md:p-6 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background-color: #AAFFC7;">
                    <svg class="w-5 h-5" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold" style="color: #124170;" data-counter data-target="<?php echo e($totalNewArrivals); ?>" data-duration="800"><?php echo e($totalNewArrivals); ?></p>
            <p class="text-sm text-gray-500 mt-1">New Arrival</p>
        </div>
    </div>

    <div data-reveal="fade-up" data-reveal-delay="300" class="mt-8">
        <div class="bg-white rounded-2xl shadow-sm p-6 md:p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background-color: #AAFFC7;">
                    <svg class="w-4 h-4" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-gray-800">Produk per Kategori</h2>
            </div>
            <div class="space-y-5">
                <?php $__currentLoopData = $productsPerCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div data-reveal="fade-up" data-reveal-delay="<?php echo e(50 * $index); ?>">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700"><?php echo e($cat->name); ?></span>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-semibold" style="color: #124170;"><?php echo e($cat->products_count); ?></span>
                                <span class="text-xs text-gray-400">(<?php echo e($totalProducts > 0 ? round(($cat->products_count / $totalProducts) * 100) : 0); ?>%)</span>
                            </div>
                        </div>
                        <div class="w-full h-2.5 rounded-full bg-gray-100 overflow-hidden">
                            <div class="h-full rounded-full progress-bar-animate" style="width: <?php echo e($totalProducts > 0 ? ($cat->products_count / $totalProducts) * 100 : 0); ?>%; background: linear-gradient(90deg, #AAFFC7, #67C090);"></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\DIKSHOP\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>