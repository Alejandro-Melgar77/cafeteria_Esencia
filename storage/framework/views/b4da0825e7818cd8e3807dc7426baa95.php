<?php $__env->startSection('content'); ?>
    <div class="flex min-h-screen w-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-32 w-auto" src="<?php echo e(asset('images/logo.png')); ?>" alt="Cafeteria Logo">
            <h2 class="mt-4 font-bold text-xl text-center text-brown-800">Inicia sesión con tu cuenta
            </h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm bg-white p-8 rounded-xl border-4 border-brown-400 shadow-md">
            <?php if($errors->any()): ?>
                <div class="mb-4">
                    <div class="bg-red-100
                        border border-red-400 text-red-700 px-4 py-3 rounded-lg relative"
                        role="alert">
                        <strong class="font-semibold">Error: </strong>
                        <span class="block sm:inline"><?php echo e($errors->first()); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <form class="space-y-6" action="<?php echo e(route('login.post')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-brown-900">Correo</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-lg bg-white px-3 py-2 text-base text-gray-900 outline-1 
                            -outline-offset-1 outline-brown-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 
                            focus:outline-orange-500 sm:text-sm/6 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 ring-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Correo electrónico" value="<?php echo e(old('email')); ?>">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-brown-900">Contraseña</label>
                        <div class="text-sm">
                            <a href="<?php echo e(route('password.request')); ?>" class="font-semibold text-orange-900 hover:text-orange-700">Olvidaste tu
                                contraseña?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" required
                            class="block w-full rounded-lg bg-white px-3 py-2 text-base text-gray-900 outline-1 
                            -outline-offset-1 outline-brown-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 
                            focus:outline-orange-500 sm:text-sm/6 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 ring-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Contraseña">
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-lg bg-brown-600 px-3 py-2 
                        text-sm/6 font-semibold text-white shadow-xs hover:bg-brown-500 focus-visible:outline-2 
                        focus-visible:outline-offset-2 focus-visible:outline-brown-600 cursor-pointer">
                        Ingresar
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-500">
                ¿Aún no tienes una cuenta?
                <a href="<?php echo e(route('register')); ?>" class="font-semibold text-orange-900 hover:text-orange-700">Registrate</a>
            </p>
        </div>
    </div>

    <div class="absolute top-4 right-4">
        <a href="<?php echo e(url('/')); ?>" class="decoration-none text-gray-800 hover:text-gray-600 px-4 py-2">
            < Ir a la pagina principal </a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cafeteria_Esencia-master\resources\views/auth/login.blade.php ENDPATH**/ ?>