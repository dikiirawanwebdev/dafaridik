<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin DAFARIDIK</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-50 text-gray-800 antialiased">

    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out" style="background: linear-gradient(180deg, #124170 0%, #215B63 100%);">
            <div class="flex items-center justify-between px-6 py-5 border-b border-white/10">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-extrabold tracking-tight text-white">
                    <span style="color: #AAFFC7;">DAFARIDIK</span>
                    <span class="text-xs font-normal block text-white/60">Admin Panel</span>
                </a>
                <button id="close-sidebar" class="md:hidden text-white/60 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <nav class="px-4 py-6 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 @if(request()->routeIs('admin.dashboard')) text-white bg-white/15 @else text-white/70 hover:text-white hover:bg-white/10 @endif">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 @if(request()->routeIs('admin.products.*')) text-white bg-white/15 @else text-white/70 hover:text-white hover:bg-white/10 @endif">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Produk
                </a>
                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 @if(request()->routeIs('admin.categories.*')) text-white bg-white/15 @else text-white/70 hover:text-white hover:bg-white/10 @endif">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    Kategori
                </a>
            </nav>

            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/5">
                    <div class="w-8 h-8 rounded-full bg-[#AAFFC7] flex items-center justify-center text-sm font-bold" style="color: #124170;">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-white/50 truncate">{{ Auth::user()->email }}</p>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white/50 hover:text-white transition-colors" title="Logout">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        {{-- Overlay --}}
        <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 hidden md:hidden"></div>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col md:ml-64 min-h-screen">
            {{-- Top Bar --}}
            <header class="bg-white border-b border-gray-200 sticky top-0 z-20 animate-slide-down">
                <div class="flex items-center justify-between px-4 md:px-6 py-3">
                    <button id="open-sidebar" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <div class="flex items-center gap-4 ml-auto">
                        <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-[#124170] transition-colors flex items-center gap-1" target="_blank">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Lihat Toko
                        </a>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 p-4 md:p-6 lg:p-8 overflow-y-auto">
                @if(session('success'))
                    <div id="toast-success" class="fixed top-4 right-4 z-[60] max-w-sm">
                        <div class="bg-white shadow-lg rounded-xl px-5 py-4 border-l-4 flex items-start gap-3 animate-slide-right" style="border-left-color: #67C090;">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color: #67C090;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">{{ session('success') }}</p>
                            </div>
                            <button onclick="dismissToast('toast-success')" class="text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div id="toast-error" class="fixed top-4 right-4 z-[60] max-w-sm">
                        <div class="bg-white shadow-lg rounded-xl px-5 py-4 border-l-4 flex items-start gap-3 animate-slide-right" style="border-left-color: #EF4444;">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">{{ session('error') }}</p>
                            </div>
                            <button onclick="dismissToast('toast-error')" class="text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        document.getElementById('open-sidebar')?.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        });
        document.getElementById('close-sidebar')?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
        overlay?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // Toast dismiss
        function dismissToast(id) {
            const el = document.getElementById(id);
            if (el) {
                el.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                el.style.opacity = '0';
                el.style.transform = 'translateX(100%)';
                setTimeout(() => el.remove(), 300);
            }
        }
        setTimeout(() => {
            ['toast-success', 'toast-error'].forEach(id => dismissToast(id));
        }, 5000);

        // ── Professional Scroll Animations ──
        const ScrollEngine = {
            init() {
                this.observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (!entry.isIntersecting) return;
                        const el = entry.target;
                        const type = el.dataset.reveal || 'fade-up';
                        const delay = parseInt(el.dataset.revealDelay) || 0;
                        const once = el.dataset.revealOnce !== 'false';

                        setTimeout(() => {
                            if (type === 'stagger') {
                                el.classList.add('animating');
                            } else if (type === 'stagger-rows') {
                                el.classList.add('animating');
                            } else {
                                el.classList.add('revealed');
                            }
                        }, delay);

                        if (once) this.observer.unobserve(el);
                    });
                }, {
                    threshold: parseFloat(document.body.dataset.revealThreshold) || 0.08,
                    rootMargin: '0px 0px -40px 0px'
                });

                document.querySelectorAll('[data-reveal]').forEach(el => {
                    const type = el.dataset.reveal;
                    if (type === 'stagger' || type === 'stagger-rows') {
                        el.style.opacity = '1';
                    }
                    this.observer.observe(el);
                });

                // Counter animation
                this.initCounters();
            },

            initCounters() {
                const counterObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (!entry.isIntersecting) return;
                        const el = entry.target;
                        const target = parseInt(el.dataset.target) || 0;
                        const duration = parseInt(el.dataset.duration) || 600;
                        this.animateCounter(el, target, duration);
                        counterObserver.unobserve(el);
                    });
                }, { threshold: 0.5 });

                document.querySelectorAll('[data-counter]').forEach(el => {
                    el.textContent = '0';
                    counterObserver.observe(el);
                });
            },

            animateCounter(el, target, duration) {
                const start = performance.now();
                const step = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.floor(eased * target);
                    if (progress < 1) requestAnimationFrame(step);
                    else el.textContent = target;
                };
                requestAnimationFrame(step);
            }
        };

        document.addEventListener('DOMContentLoaded', () => ScrollEngine.init());
    </script>
</body>
</html>
