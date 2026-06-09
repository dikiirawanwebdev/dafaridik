<?php $__env->startSection('title', 'Kategori'); ?>

<?php $__env->startSection('content'); ?>
    <div data-reveal="fade-up">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Kategori</h1>
                <p class="text-gray-500 mt-1">Kelola kategori produk</p>
            </div>
            <button type="button" id="open-create-modal" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-95 hover:shadow-lg" style="background-color: #124170;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Kategori
            </button>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-2xl shadow-sm overflow-hidden" data-reveal="stagger-rows">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left" style="background-color: #215B63;">
                        <th class="px-4 md:px-6 py-3 font-semibold text-white text-xs uppercase tracking-wider">Nama</th>
                        <th class="px-4 md:px-6 py-3 font-semibold text-white text-xs uppercase tracking-wider hidden sm:table-cell">Deskripsi</th>
                        <th class="px-4 md:px-6 py-3 font-semibold text-white text-xs uppercase tracking-wider">Jumlah Produk</th>
                        <th class="px-4 md:px-6 py-3 font-semibold text-white text-xs uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-4 md:px-6 py-4">
                                <p class="font-medium text-gray-800"><?php echo e($category->name); ?></p>
                                <p class="text-xs text-gray-400 mt-0.5">/<?php echo e($category->slug); ?></p>
                            </td>
                            <td class="px-4 md:px-6 py-4 hidden sm:table-cell">
                                <p class="text-gray-500 max-w-xs truncate"><?php echo e($category->description ?? '-'); ?></p>
                            </td>
                            <td class="px-4 md:px-6 py-4">
                                <span class="font-semibold" style="color: #215B63;"><?php echo e($category->products_count); ?></span>
                            </td>
                            <td class="px-4 md:px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button type="button" class="p-2 rounded-lg hover:bg-gray-100 transition-colors edit-btn group"
                                            data-id="<?php echo e($category->id); ?>"
                                            data-name="<?php echo e($category->name); ?>"
                                            data-description="<?php echo e($category->description); ?>">
                                        <svg class="w-4 h-4 text-gray-400 group-hover:text-[#124170] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>" method="POST" class="delete-form inline">
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
                            <td colspan="4" class="px-6 py-16 text-center">
                                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <p class="text-gray-400 font-medium">Belum ada kategori</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6" data-reveal="fade-up">
        <?php echo e($categories->links()); ?>

    </div>

    
    <div id="create-modal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-md animate-scale-in">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Tambah Kategori</h3>
                    <button type="button" class="close-modal p-1 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.categories.store')); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="create-name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Kategori <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="create-name"
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"
                               required>
                    </div>
                    <div>
                        <label for="create-description" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                        <textarea name="description" id="create-description" rows="3"
                                  class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"></textarea>
                    </div>
                    <div class="flex gap-3 pt-2">
                        <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-95" style="background-color: #124170;">
                            Simpan
                        </button>
                        <button type="button" class="close-modal px-6 py-2.5 rounded-xl text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div id="edit-modal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-md animate-scale-in">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Edit Kategori</h3>
                    <button type="button" class="close-modal p-1 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <form id="edit-form" action="" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                    <div>
                        <label for="edit-name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Kategori <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="edit-name"
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"
                               required>
                    </div>
                    <div>
                        <label for="edit-description" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                        <textarea name="description" id="edit-description" rows="3"
                                  class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"></textarea>
                    </div>
                    <div class="flex gap-3 pt-2">
                        <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-95" style="background-color: #124170;">
                            Simpan Perubahan
                        </button>
                        <button type="button" class="close-modal px-6 py-2.5 rounded-xl text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors">Batal</button>
                    </div>
                </form>
            </div>
        </div>
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
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Hapus Kategori?</h3>
                    <p class="text-sm text-gray-500 mb-6">Kategori dengan produk tidak bisa dihapus.</p>
                    <div class="flex gap-3">
                        <button type="button" id="cancel-delete" class="flex-1 px-4 py-2.5 rounded-xl text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors">Batal</button>
                        <button type="button" id="confirm-delete" class="flex-1 px-4 py-2.5 rounded-xl text-sm font-medium text-white transition-all duration-200 hover:scale-[1.02]" style="background-color: #DC2626;">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let activeForm = null;

        document.querySelectorAll('.close-modal').forEach(btn => {
            btn.addEventListener('click', function() {
                this.closest('.fixed').classList.add('hidden');
            });
        });

        document.getElementById('open-create-modal')?.addEventListener('click', () => {
            document.getElementById('create-modal').classList.remove('hidden');
        });

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const desc = this.dataset.description;
                document.getElementById('edit-name').value = name;
                document.getElementById('edit-description').value = desc;
                document.getElementById('edit-form').action = '<?php echo e(url("/admin/categories")); ?>/' + id;
                document.getElementById('edit-modal').classList.remove('hidden');
            });
        });

        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                activeForm = this.closest('form');
                document.getElementById('delete-modal').classList.remove('hidden');
            });
        });

        document.getElementById('cancel-delete')?.addEventListener('click', () => {
            document.getElementById('delete-modal').classList.add('hidden');
        });

        document.getElementById('confirm-delete')?.addEventListener('click', () => {
            if (activeForm) activeForm.submit();
        });

        document.querySelectorAll('#create-modal .absolute, #edit-modal .absolute, #delete-modal .absolute').forEach(el => {
            el.addEventListener('click', function() {
                this.closest('.fixed').classList.add('hidden');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\DIKSHOP\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>