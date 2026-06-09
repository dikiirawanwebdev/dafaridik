<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>
    <div data-reveal="fade-up">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Produk</h1>
                <p class="text-gray-500 mt-1">Kelola produk toko</p>
            </div>
            <a href="<?php echo e(route('admin.products.create')); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-95 hover:shadow-lg" style="background-color: #124170;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Produk
            </a>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-2xl shadow-sm overflow-hidden" data-reveal="stagger-rows">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left" style="background-color: #215B63;">
                        <th class="px-4 md:px-6 py-3 font-semibold text-white text-xs uppercase tracking-wider">Gambar</th>
                        <th class="px-4 md:px-6 py-3 font-semibold text-white text-xs uppercase tracking-wider">Nama</th>
                        <th class="px-4 md:px-6 py-3 font-semibold text-white text-xs uppercase tracking-wider hidden md:table-cell">Kategori</th>
                        <th class="px-4 md:px-6 py-3 font-semibold text-white text-xs uppercase tracking-wider">Harga</th>
                        <th class="px-4 md:px-6 py-3 font-semibold text-white text-xs uppercase tracking-wider hidden lg:table-cell">Label</th>
                        <th class="px-4 md:px-6 py-3 font-semibold text-white text-xs uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-4 md:px-6 py-4">
                                <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" class="w-12 h-12 md:w-14 md:h-14 rounded-xl object-cover ring-1 ring-gray-200" loading="lazy">
                            </td>
                            <td class="px-4 md:px-6 py-4">
                                <p class="font-medium text-gray-800"><?php echo e($product->name); ?></p>
                            </td>
                            <td class="px-4 md:px-6 py-4 hidden md:table-cell">
                                <span class="text-xs font-semibold px-2 py-1 rounded-full" style="color: #124170; background-color: #AAFFC7;">
                                    <?php echo e($product->category->name); ?>

                                </span>
                            </td>
                            <td class="px-4 md:px-6 py-4">
                                <span class="font-semibold" style="color: #215B63;"><?php echo e($product->formatted_price); ?></span>
                            </td>
                            <td class="px-4 md:px-6 py-4 hidden lg:table-cell">
                                <div class="flex gap-1.5">
                                    <?php if($product->is_best_seller): ?>
                                        <span class="text-xs font-bold px-2 py-0.5 rounded-full text-white" style="background-color: #215B63;">BEST</span>
                                    <?php endif; ?>
                                    <?php if($product->is_new_arrival): ?>
                                        <span class="text-xs font-bold px-2 py-0.5 rounded-full text-white" style="background-color: #124170;">NEW</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 md:px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="p-2 rounded-lg hover:bg-gray-100 transition-colors group" title="Edit">
                                        <svg class="w-4 h-4 text-gray-400 group-hover:text-[#124170] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST" class="delete-form inline">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="button" class="p-2 rounded-lg hover:bg-red-50 transition-colors delete-btn group" title="Hapus">
                                            <svg class="w-4 h-4 text-gray-400 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                <p class="text-gray-400 font-medium">Belum ada produk</p>
                                <a href="<?php echo e(route('admin.products.create')); ?>" class="inline-block mt-3 text-sm font-semibold" style="color: #124170;">Tambah produk pertama</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6" data-reveal="fade-up">
        <?php echo e($products->links()); ?>

    </div>

    
    <div id="delete-modal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-sm animate-scale-in">
                <div class="text-center">
                    <div class="w-14 h-14 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Hapus Produk?</h3>
                    <p class="text-sm text-gray-500 mb-6">Tindakan ini tidak bisa dibatalkan.</p>
                    <div class="flex gap-3">
                        <button type="button" id="cancel-delete" class="flex-1 px-4 py-2.5 rounded-xl text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors">Batal</button>
                        <button type="button" id="confirm-delete" class="flex-1 px-4 py-2.5 rounded-xl text-sm font-medium text-white transition-all duration-200 hover:scale-[1.02]" style="background-color: #DC2626;">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let deleteForm = null;
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                deleteForm = this.closest('form');
                document.getElementById('delete-modal').classList.remove('hidden');
            });
        });
        document.getElementById('cancel-delete')?.addEventListener('click', () => {
            document.getElementById('delete-modal').classList.add('hidden');
        });
        document.getElementById('confirm-delete')?.addEventListener('click', () => {
            if (deleteForm) deleteForm.submit();
        });
        document.getElementById('delete-modal')?.querySelector('.absolute')?.addEventListener('click', () => {
            document.getElementById('delete-modal').classList.add('hidden');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\DIKSHOP\resources\views/admin/products/index.blade.php ENDPATH**/ ?>