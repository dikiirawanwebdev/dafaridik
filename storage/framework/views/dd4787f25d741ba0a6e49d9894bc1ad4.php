<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin DikStore</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased" style="background: linear-gradient(135deg, #AAFFC7 0%, #67C090 50%, #215B63 100%);">

    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md animate-fade-in">
            <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 md:p-10">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-extrabold tracking-tight" style="color: #215B63;">
                        <span style="color: #215B63;">DAFARIDIK</span>
                    </h1>
                    <p class="text-sm text-gray-500 mt-2">Admin Panel - Silakan login</p>
                </div>

                <form method="POST" action="<?php echo e(route('admin.login')); ?>" class="space-y-5">
                    <?php echo csrf_field(); ?>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>"
                               class="w-full px-4 py-2.5 rounded-xl border <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php else: ?> border-gray-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"
                               placeholder="admin@ystore.com" required autofocus>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-xs text-red-500 mt-1.5"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <input type="password" name="password" id="password"
                               class="w-full px-4 py-2.5 rounded-xl border <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php else: ?> border-gray-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> focus:ring-2 focus:ring-[#67C090] focus:border-[#67C090] outline-none transition-all text-sm"
                               placeholder="••••••••" required>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-xs text-red-500 mt-1.5"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-[#124170] focus:ring-[#124170]">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
                    </div>

                    <button type="submit" class="w-full py-2.5 rounded-xl text-sm font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-95 hover:shadow-lg" style="background-color: #124170;">
                        Masuk
                    </button>
                </form>
            </div>
            <p class="text-center text-sm text-white/80 mt-6">
                &copy; <?php echo e(date('Y')); ?> DAFARIDIK. All rights reserved.
            </p>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\DIKSHOP\resources\views/admin/login.blade.php ENDPATH**/ ?>