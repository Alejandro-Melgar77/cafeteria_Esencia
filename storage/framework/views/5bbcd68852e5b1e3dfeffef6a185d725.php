<?php if($errors->any()): ?>
    <div class="mb-4">
        <div class="bg-red-100
                        border border-red-400 text-red-700 px-4 py-3 rounded-lg relative"
            role="alert">
            <strong class="font-bold">¡Error!</strong>
            <span class="block sm:inline">Por favor corrige los errores en el formulario.</span>
            <ul class="list-disc pl-5 mt-2">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="text-sm text-red-600"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\aleme\Desktop\actualizacion de contraseña cafeteriaEsencia\La-Escencia-master act contra\resources\views/partials/errors.blade.php ENDPATH**/ ?>