<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'DAFARIDIK'); ?> - Toko Pakaian Pria</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans bg-[#AAFFC7] text-gray-800 antialiased">

    <nav class="bg-white/90 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-white/20 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center space-x-2 group">
                    <span class="text-2xl font-extrabold tracking-tight" style="color: #215B63;">
                        DAFARIDIK
                    </span>
                </a>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?php echo e(route('home')); ?>" class="font-medium text-sm transition-all duration-200 hover:scale-105" style="color: #215B63;">
                        Beranda
                    </a>
                    <a href="<?php echo e(route('products.index')); ?>" class="font-medium text-sm transition-all duration-200 hover:scale-105" style="color: #215B63;">
                        Produk
                    </a>
                    <a href="<?php echo e(route('cart.index')); ?>" class="relative flex items-center space-x-1 font-medium text-sm transition-all duration-200 hover:scale-105" style="color: #215B63;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                        <span>Cart</span>
                        <?php $cartCount = count(session('cart', [])); ?>
                        <?php if($cartCount > 0): ?>
                            <span class="absolute -top-2 -right-3 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center animate-scale-in" style="background-color: #124170;">
                                <?php echo e($cartCount); ?>

                            </span>
                        <?php endif; ?>
                    </a>
                </div>

                <div class="md:hidden flex items-center space-x-4">
                    <a href="<?php echo e(route('cart.index')); ?>" class="relative p-2">
                        <svg class="w-6 h-6" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                        <?php $cartCount = count(session('cart', [])); ?>
                        <?php if($cartCount > 0): ?>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center" style="background-color: #124170;">
                                <?php echo e($cartCount); ?>

                            </span>
                        <?php endif; ?>
                    </a>
                    <button id="menu-toggle" class="p-2 rounded-lg transition-colors duration-200 hover:bg-[#AAFFC7]/50">
                        <svg class="w-6 h-6" style="color: #215B63;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-2">
                <a href="<?php echo e(route('home')); ?>" class="block px-3 py-2 rounded-lg font-medium text-sm transition-colors duration-200 hover:bg-[#AAFFC7]/50" style="color: #215B63;">
                    Beranda
                </a>
                <a href="<?php echo e(route('products.index')); ?>" class="block px-3 py-2 rounded-lg font-medium text-sm transition-colors duration-200 hover:bg-[#AAFFC7]/50" style="color: #215B63;">
                    Produk
                </a>
            </div>
        </div>
    </nav>

    <?php if(session('success')): ?>
        <div class="fixed top-20 right-4 z-[60] animate-slide-up" id="alert-success">
            <div class="bg-white shadow-lg rounded-xl px-6 py-4 border-l-4 flex items-center space-x-3" style="border-left-color: #67C090;">
                <svg class="w-5 h-5 flex-shrink-0" style="color: #67C090;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-sm font-medium text-gray-700"><?php echo e(session('success')); ?></span>
                <button onclick="document.getElementById('alert-success').remove()" class="ml-4 text-gray-400 hover:text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="fixed top-20 right-4 z-[60] animate-slide-up" id="alert-error">
            <div class="bg-white shadow-lg rounded-xl px-6 py-4 border-l-4 flex items-center space-x-3" style="border-left-color: #EF4444;">
                <svg class="w-5 h-5 flex-shrink-0 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-sm font-medium text-gray-700"><?php echo e(session('error')); ?></span>
                <button onclick="document.getElementById('alert-error').remove()" class="ml-4 text-gray-400 hover:text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="text-white" style="background-color: #215B63;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-2xl font-extrabold tracking-tight mb-4">
                        <span style="color: #AAFFC7;">DAFARIDIK</span>
                    </h3>
                    <p class="text-sm opacity-80 leading-relaxed">
                        Toko pakaian pria terpercaya. Temukan gaya terbaikmu dengan koleksi fashion pria terkini.
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4" style="color: #AAFFC7;">Navigasi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="<?php echo e(route('home')); ?>" class="opacity-80 hover:opacity-100 transition-opacity">Beranda</a></li>
                        <li><a href="<?php echo e(route('products.index')); ?>" class="opacity-80 hover:opacity-100 transition-opacity">Produk</a></li>
                        <li><a href="<?php echo e(route('cart.index')); ?>" class="opacity-80 hover:opacity-100 transition-opacity">Keranjang</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4" style="color: #AAFFC7;">Kontak</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center space-x-2 opacity-80">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>+62 812-3456-7890</span>
                        </li>
                        <li class="flex items-center space-x-2 opacity-80">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>hello@ystore.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-white/20 text-center text-sm opacity-60">
                &copy; <?php echo e(date('Y')); ?> DAFARIDIK. All rights reserved.
            </div>
        </div>
    </footer>

    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-50 w-14 h-14 rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-xl animate-scale-in"
       style="background-color: #124170;">
        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

    <script>
        document.getElementById('menu-toggle')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-slide-up');
                    entry.target.style.opacity = '1';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            el.style.opacity = '0';
            observer.observe(el);
        });
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\DIKSHOP\resources\views/layouts/app.blade.php ENDPATH**/ ?>